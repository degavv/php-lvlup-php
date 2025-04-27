<?php

function index(): void
{
    isAuth();
    view('index');
    saveCredentials('','123qwe');
}
