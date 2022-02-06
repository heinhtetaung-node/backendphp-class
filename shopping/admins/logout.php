<?php

session_start();

unset($_SESSION['user']);
unset($_SESSION['login_time']);

header('Location: login');