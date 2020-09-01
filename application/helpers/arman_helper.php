<?php

function login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id_user')) {
        redirect('login');
    }
}

function admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('level') != 'Admin') {
        redirect('dashboard/error');
    }
}
