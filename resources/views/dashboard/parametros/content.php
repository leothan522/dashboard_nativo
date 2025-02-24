<?php

if (\app\Providers\Auth::validatePermissions('admin')){
    echo "hola";
}
