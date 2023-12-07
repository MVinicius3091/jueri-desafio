<?php

require_once '../services/ToolServices.php';

session_unset();
session_destroy();

ToolServices::redirect('/login');
