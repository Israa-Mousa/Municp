<?php
use Illuminate\Support\Facades\Session;

Session::put('roleID', $request->input('role') );

echo Session::get('roleID');
die();

?>
