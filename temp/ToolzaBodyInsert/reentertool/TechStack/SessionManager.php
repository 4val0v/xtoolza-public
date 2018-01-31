<?php

class SessionManager {

    /**
     * Некоторые апачевские модули перехватывают уникальность вроде {ip, session_id}
     * лочат сессию и передают управление php, при запуске скриптовой сессии если
     * уникальность совпадает то разлочивает
     */
    public function SessionWriteClose(){
        session_write_close();
    }
} 