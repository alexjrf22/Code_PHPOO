<?php

namespace Alex\Config;

class ConfigData
{
    
    public function DataParaBR($dataUS)
    {
        $data = explode ('-', $dataUS);
        $dataBR = $data[2] . '/' . $data[1] . '/' . $data[0];
        return $dataBR;
    }
    public function DataParaUS($dataBR)
    {
        $data = explode ('/', $dataBR);
        $dataUS = $data[2] . '-' . $data[1] . '-' . $data[0];
        return $dataUS;
    }
    
}

