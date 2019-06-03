<?php

c::set('debug', true);
c::set('license', 'put your license key here');
c::set('panel.install', true);

c::set('mail.receiver', 'h.dodov@gmail.com');
c::set('google.maps.key', 'AIzaSyAfmWnMXJVPTlpT8dS6TIrQzuq0IBJdEf0');
c::set('google.maps.styles.gray', kirby()->urls()->assets() . DS . 'maps' . DS . 'gray.json');

c::set('languages', array(
    array(
        'code'      => 'bg',
        'name'      => 'Български',
        'locale'    => 'bg_BG',
        'url'       => '/',
        'default'   => true
    ),
    array(
        'code'      => 'en',
        'name'      => 'English',
        'locale'    => 'en_US',
        'url'       => '/en',
    )
));

function verifyCaptcha ($value) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => [
            'secret' => '6Lf-0aYUAAAAAPIoMMvtaruG9aLSzMEb9NEkN6QC',
            'response' => $value
        ]
    ]);

    return (array)json_decode(curl_exec($ch));
}

c::set('routes', array(
    array(
        'pattern' => '(?:(en)\/|())message',
        'method' => 'POST',
        'action' => function ($lang) {
            $site = site();
            if (empty($lang)) {
                $lang = $site->defaultLanguage()->code();
            }

            include_once kirby()->roots()->languages() . DS . str::lower($lang) . '.php';

            $captchaResult = verifyCaptcha($_POST['g-recaptcha-response']);
            $response = array(
                'status' => 'error'
            );

            if ($captchaResult['success'] === true) {
                if (
                    !empty($_POST['name']) &&
                    !empty($_POST['email']) &&
                    !empty($_POST['message'])
                ) {
                    $email = email(array(
                        'to'        => c::get('mail.receiver'),
                        'from'      => sprintf('%s <%s>', $_POST['name'], $_POST['email']),
                        'subject'   => sprintf(l::get('mail.subject'), $site->content($lang)->title()),
                        'body'      => $_POST['message']
                    ));

                    try {
                        $result = $email->send();
                    } catch (Error $e) {
                        $result = false;
                        $email->error = $e;
                    }

                    if ($result) {
                        $response['status'] = 'success';
                    } else {
                        if ($email->error()) {
                            $response['message'] = $email->error()->getMessage();
                        }
                    }
                } else {
                    $response['message'] = 'Missing input data.';
                }
            } else {
                $response['message'] = 'Invalid captcha.';
            }

            return response::json($response);
        }
    )
));