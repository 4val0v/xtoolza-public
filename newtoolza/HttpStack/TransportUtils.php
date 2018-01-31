<?php

class TransportUtils{

    /**
     * @param $arrays
     * @param array $new
     * @param null $prefix
     */
    public function Rebuilder($arrays, &$new = array(), $prefix = null ) {

        if ( is_object( $arrays ) ) {
            $arrays = get_object_vars( $arrays );
        }

        foreach ( $arrays AS $key => $value ) {
            $k = isset( $prefix ) ? $prefix . '[' . $key . ']' : $key;

            if ( is_array( $value ) OR is_object( $value )  ) {
                $this->Rebuilder( $value, $new, $k );
            } else {
                $new[$k] = $value;
            }
        }
    }

    /**
     * @param $array
     * @param $path
     * @return mixed
     */
    public function GetArrayFromPath($array, $path){
        $path = explode("[",trim(str_replace(']','',$path),']['));
        $needArray = $array;
        foreach($path as $k => $v){
            $needArray = $this->GetArrayFromKey($needArray,$v);
        }
        return $needArray;
    }

    /**
     * @param $array
     * @param $key
     * @return mixed
     */
    public function GetArrayFromKey($array,$key){
        return $array[$key];
    }

    /**
     * @param $variable
     * @return array|string
     */
    public function StripslashesRecur($variable)
    {
        if ( is_string( $variable ) ){
            return stripslashes( $variable );
        }
        if ( is_array( $variable ) ){
            foreach( $variable as $i => $value ){
                $variable[ $i ] = $this->StripslashesRecur( $value );
            }
        }
        return $variable ;
    }

    /**
     * @param $arrays
     * @param array $new
     * @param null $prefix
     */
    public function RebuilderFiles($arrays, &$new = array(), $prefix = null ) {

        if ( is_object( $arrays ) ) {
            $arrays = get_object_vars( $arrays );
        }

        foreach ( $arrays AS $key => $value ) {
            if(!is_array($value)){
                $k = isset( $prefix ) ? $prefix : $key;
            } else {
                $k = isset( $prefix ) ? $prefix . '[' . $key . ']' : $key  ;
            }

            if ( is_array( $value ) OR is_object( $value )  ) {
                $this->RebuilderFiles( $value, $new, $k );
            } else {
//                if(count(explode("][",$k)) == 1){
//                    $k = trim($k,'][');
//                }
                $new[$k] = $value;
            }
        }
    }

    /**
     * @param $defFileArray
     * @return array
     */
    public function ShifterFiles($defFileArray)
    {
        $rebFiles = array();
        foreach($defFileArray as $name=>$file){
            if(is_array($file['name'])){
                foreach(array_keys($file['name']) as $key){
                    $rebFiles[$name][$key] = array(
                        'name'     => $file['name'][$key],
                        'type'     => $file['type'][$key],
                        'tmp_name' => $file['tmp_name'][$key],
                        'error'    => $file['error'][$key],
                        'size'     => $file['size'][$key],
                    );
                    $rebFiles[$name] = $this->ShifterFiles($rebFiles[$name]);
                }
            }else{
                $rebFiles[$name] = $file;
            }
        }
        return $rebFiles;
    }

    /**
     * @param $postArray
     * @param bool $toNewSpecification
     * @return string
     */
    public static function HttpBuildQuery($postArray, $toNewSpecification){
        $postLine = http_build_query($postArray);
        return $toNewSpecification ? str_replace('&amp;','&', $postLine):$postLine;
    }

}

?>