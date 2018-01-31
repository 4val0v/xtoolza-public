<?php

/**
 * Interface IJson
 */
interface IJson {
    function fromJson($strJson, $assoc = false);
    function toJson($obj);
} 