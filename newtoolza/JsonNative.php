<?php

class JsonNative implements IJson {


    function fromJson($strJson, $assoc = false)
    {
        return json_decode($strJson, $assoc);
    }

    function toJson($obj)
    {
        return json_encode($obj);
    }
}