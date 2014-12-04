<?php
class MakeCTeNFePHP {
    
    private $debug = null;
    private $dom = null;
    private $xml = null;
    private $CTe = null;
    private $id = null;
    private $versao = '2.00';
    private $infCte = null;
    private $ide = null;
    private $toma = null;
    private $compl = null;
    private $emit = null;
    private $rem = null;
    private $exped = null;
    private $receb = null;
    private $dest = null;
    private $vPrest = null;
    private $imp = null;
    private $ICMS = null;
    private $ICMSSN = null;
    private $infCTeNorm = null;
    private $infCteComp = null;
    private $infCteAnu = null;
    private $autXML = null;
    private $erros = array();
    
    public function __construct($debug = false){
        $this->debug = $debug;
        $this->dom = new DOMDocument('1.0', 'utf-8');
    }
    
    public function getXML(){
        if (is_null($this->infCte)){
            return false;
        } elseif ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return $this->xml;
        }
    }
    
    public function makeCTe($Chave){
        $this->infCte = $this->dom->createElement('infCte');
        $this->infCte->setAttribute('versao', $this->versao);
        $this->infCte->setAttribute('Id', $Chave);
        
        if (!is_null($this->ide)) $this->infCte->appendChild($this->ide);
        if (!is_null($this->compl)) $this->infCte->appendChild($this->compl);
        if (!is_null($this->emit)) $this->infCte->appendChild($this->emit);
        if (!is_null($this->rem)) $this->infCte->appendChild($this->rem);
        if (!is_null($this->exped)) $this->infCte->appendChild($this->exped);
        if (!is_null($this->receb)) $this->infCte->appendChild($this->receb);
        if (!is_null($this->dest)) $this->infCte->appendChild($this->dest);
        if (!is_null($this->vPrest)) $this->infCte->appendChild($this->vPrest);
        if (!is_null($this->imp)) $this->infCte->appendChild($this->imp);
        if (!is_null($this->infCTeNorm)) $this->infCte->appendChild($this->infCTeNorm);
        if (!is_null($this->infCteComp)) $this->infCte->appendChild($this->infCteComp);
        if (!is_null($this->infCteAnu)) $this->infCte->appendChild($this->infCteAnu);
        if (!is_null($this->autXML)) $this->infCte->appendChild($this->autXML);
        
        $this->CTe = $this->dom->createElement('CTe');
        $this->CTe->appendChild($this->infCte);
        
        $this->xml = '<?xml version="1.0" encoding="UTF-8"?>'.$this->dom->saveXML($this->CTe);
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setIdentificacao($cUF = null, $cCT = null, $CFOP = null, $natOp = null, $forPag = null, $mod = 57, $serie = null, $nCT = null, $dhEmi = null, $tpImp = null, $tpEmis = null, $cDV = null, $tpAmb = null, $tpCTe = null, $procEmi = null, $verProc = null, $refCTE = null, $cMunEnv = null, $xMunEnv = null, $UFEnv = null, $modal = null, $tpServ = null, $cMunIni = null, $xMunIni = null, $UFIni = null, $cMunFim = null, $xMunFim = null, $UFFim = null, $retira = null, $xDetRetira = null, $dhCont = null, $xJust){
        $this->ide = $this->dom->createElement('ide');
        $this->setCampo($this->ide, 'cUF', $cUF, true, true);
        $this->setCampo($this->ide, 'cCT', $cCT, true, true);
        $this->setCampo($this->ide, 'CFOP', $CFOP, true, true);
        $this->setCampo($this->ide, 'natOp', $natOp, true, true);
        $this->setCampo($this->ide, 'forPag', $forPag, true, true);
        $this->setCampo($this->ide, 'mod', $mod, true, true);
        $this->setCampo($this->ide, 'serie', $serie, true, true);
        $this->setCampo($this->ide, 'nCT', $nCT, true, true);
        $this->setCampo($this->ide, 'dhEmi', $dhEmi, true, true);
        $this->setCampo($this->ide, 'tpImp', $tpImp, true, true);
        $this->setCampo($this->ide, 'tpEmis', $tpEmis, true, true);
        $this->setCampo($this->ide, 'cDV', $cDV, true, true);
        $this->setCampo($this->ide, 'tpAmb', $tpAmb, true, true);
        $this->setCampo($this->ide, 'tpCTe', $tpCTe, true, true);
        $this->setCampo($this->ide, 'procEmi', $procEmi, true, true);
        $this->setCampo($this->ide, 'verProc', $verProc, true, true);
        $this->setCampo($this->ide, 'refCTE', $refCTE, false, false);
        $this->setCampo($this->ide, 'cMunEnv', $cMunEnv, true, true);
        $this->setCampo($this->ide, 'xMunEnv', $xMunEnv, true, true);
        $this->setCampo($this->ide, 'UFEnv', $UFEnv, true, true);
        $this->setCampo($this->ide, 'modal', $modal, true, true);
        $this->setCampo($this->ide, 'tpServ', $tpServ, true, true);
        $this->setCampo($this->ide, 'cMunIni', $cMunIni, true, true);
        $this->setCampo($this->ide, 'xMunIni', $xMunIni, true, true);
        $this->setCampo($this->ide, 'UFIni', $UFIni, true, true);
        $this->setCampo($this->ide, 'cMunFim', $cMunFim, true, true);
        $this->setCampo($this->ide, 'xMunFim', $xMunFim, true, true);
        $this->setCampo($this->ide, 'UFFim', $UFFim, true, true);
        $this->setCampo($this->ide, 'retira', $retira, false, false);
        $this->setCampo($this->ide, 'xDetRetira', $xDetRetira, false, false);
        if ($tpEmis!=1){
            $this->setCampo($this->ide, 'dhCont', $dhCont, true, true);
            $this->setCampo($this->ide, 'xJust', $xJust, true, false);
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setTomador($toma = null, $CNPJ = null, $CPF = null, $IE = null, $xNome = null, $xFant = null, $fone = null, $email = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $CEP = null, $UF = null, $cPais = null, $xPais = null){
        if ($toma >= 0 && $toma <= 3){
            $this->toma = $this->dom->createElement('toma03');
            $this->setCampo($this->toma, 'toma', $toma, true, true);
        } elseif ($toma==4){
            if ((empty($CNPJ) && empty($CPF)) || (!empty($CNPJ) && !empty($CPF))){
                $this->erros[] = "TAG: toma | Campo: CNPJ-CPF | Informar o CNPJ ou o CPF.";
            } else {
                $this->toma = $this->dom->createElement('toma4');
                $this->setCampo($this->toma, 'toma', 4, true, true);
                if (!empty($CNPJ)) $this->setCampo($this->toma, 'CNPJ', $CNPJ, true, true);
                if (!empty($CPF)) $this->setCampo($this->toma, 'CPF', $CPF, true, true);
                $this->setCampo($this->toma, 'IE', $IE, false, true);
                $this->setCampo($this->toma, 'xNome', $xNome, true, true);
                $this->setCampo($this->toma, 'xFant', $xFant, true, true);
                $this->setCampo($this->toma, 'fone', $fone, false, true);
                $this->setCampo($this->toma, 'email', $email, false, true);
                $enderToma = $this->dom->createElement('enderToma');
                $this->TEndereco($enderToma, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $CEP, $UF, $cPais, $xPais);
                $this->toma->appendChild($enderToma);
            }
        } else {
            $this->erros[] = "TAG: toma | Campo: Toma | O argumento toma deve estar entre 0 e 4.";
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setInfoComplementar($xCaracAd = null, $xCaracSer = null, $xEmi = null, $fluxo = null, $Entrega = null, $origCalc = null, $destCalc = null, $xObs = null, $ObsCont = null, $ObsFisco = null){
        if (!empty($xCaracAd)) $this->compl[] = $this->dom->createElement('xCaracAd', $xCaracAd);
        if (!empty($xCaracSer)) $this->compl[] = $this->dom->createElement('xCaracSer', $xCaracSer);
        if (!empty($xEmi)) $this->compl[] = $this->dom->createElement('xEmi', $xEmi);
        if (!empty($fluxo)) $this->compl[] = $this->dom->createElement('fluxo', $fluxo);
        if (!empty($Entrega)) $this->compl[] = $this->dom->createElement('Entrega', $Entrega);
        if (!empty($origCalc)) $this->compl[] = $this->dom->createElement('origCalc', $origCalc);
        if (!empty($destCalc)) $this->compl[] = $this->dom->createElement('destCalc', $destCalc);
        if (!empty($xObs)) $this->compl[] = $this->dom->createElement('xObs', $xObs);
        if (!empty($ObsCont)) $this->compl[] = $this->dom->createElement('ObsCont', $ObsCont);
        if (!empty($ObsFisco)) $this->compl[] = $this->dom->createElement('ObsFisco', $ObsFisco);
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setEmitente($CNPJ = null, $IE = null, $xNome = null, $xFant = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $CEP = null, $UF = null, $fone = null){
        $this->emit = $this->dom->createElement('emit');
        $enderEmit = $this->dom->createElement('enderEmit');
        $this->setCampo($this->emit, 'CNPJ', $CNPJ, true, true);
        $this->setCampo($this->emit, 'IE', $IE, true, true);
        $this->setCampo($this->emit, 'xNome', $xNome, true, true);
        $this->setCampo($this->emit, 'xFant', $xFant, true, true);
        $this->setCampo($enderEmit, 'xLgr', $xLgr, true, true);
        $this->setCampo($enderEmit, 'nro', $nro, true, true);
        $this->setCampo($enderEmit, 'xCpl', $xCpl, false, false);
        $this->setCampo($enderEmit, 'xBairro', $xBairro, false, false);
        $this->setCampo($enderEmit, 'cMun', $cMun, true, true);
        $this->setCampo($enderEmit, 'xMun', $xMun, true, true);
        $this->setCampo($enderEmit, 'CEP', $CEP, true, true);
        $this->setCampo($enderEmit, 'UF', $UF, true, true);
        $this->setCampo($enderEmit, 'fone', $fone, false, false);
        $this->emit->appendChild($enderEmit);
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setRemetente($CNPJ = null, $CPF = null, $IE = null, $xNome = null, $xFant = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $CEP = null, $UF = null, $cPais = null, $xPais = null, $fone = null, $email = null){
        if ((empty($CNPJ) && empty($CPF)) || (!empty($CNPJ) && !empty($CPF))){
            $this->erros[] = "TAG: rem | Campo: CNPJ-CPF | Informar o CNPJ ou o CPF.";
        } else {
            $this->rem = $this->dom->createElement('rem');
            $this->setCampo($this->rem, 'toma', 4, true, true);
            if (!empty($CNPJ)) $this->setCampo($this->rem, 'CNPJ', $CNPJ, true, true);
            if (!empty($CPF)) $this->setCampo($this->rem, 'CPF', $CPF, true, true);
            $this->setCampo($this->rem, 'IE', $IE, false, true);
            $this->setCampo($this->rem, 'xNome', $xNome, true, true);
            $this->setCampo($this->rem, 'xFant', $xFant, true, true);
            $this->setCampo($this->rem, 'fone', $fone, false, true);
            $enderReme = $this->dom->createElement('enderReme');
            $this->TEndereco($enderReme, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $CEP, $UF, $cPais, $xPais);
            $this->rem->appendChild($enderReme);
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setLocalColeta($CNPJ = null, $CPF = null, $xNome = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $UF = null){
        if (is_null($this->rem)){
            $this->erros[] = "Não é possível definir o local de coleta sem definir a TAG de remetente.";
        } else {
            $locColeta = $this->dom->createElement('locColeta');
            $this->TEndReEnt($locColeta, $CNPJ, $CPF, $xNome, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF);
            $this->rem->appendChild($locColeta);
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setExpedidor($CNPJ = null, $CPF = null, $IE = null, $xNome = null, $fone = null, $email = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $CEP = null, $UF = null, $cPais = null, $xPais = null){
        if ((empty($CNPJ) && empty($CPF)) || (!empty($CNPJ) && !empty($CPF))){
            $this->erros[] = "TAG: exped | Campo: CNPJ-CPF | Informar o CNPJ ou o CPF.";
        } else {
            $this->exped = $this->dom->createElement('exped');
            if (!empty($CNPJ)) $this->setCampo($this->exped, 'CNPJ', $CNPJ, true, true);
            if (!empty($CPF)) $this->setCampo($this->exped, 'CPF', $CPF, true, true);
            $this->setCampo($this->exped, 'IE', $IE, false, true);
            $this->setCampo($this->exped, 'xNome', $xNome, true, true);
            $this->setCampo($this->exped, 'fone', $fone, false, true);
            $this->setCampo($this->exped, 'email', $email, false, true);
            $enderExped = $this->dom->createElement('enderExped');
            $this->TEndereco($enderExped, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $CEP, $UF, $cPais, $xPais);
            $this->exped->appendChild($enderExped);
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setRecebedor($CNPJ = null, $CPF = null, $IE = null, $xNome = null, $fone = null, $email = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $CEP = null, $UF = null, $cPais = null, $xPais = null){
        if ((empty($CNPJ) && empty($CPF)) || (!empty($CNPJ) && !empty($CPF))){
            $this->erros[] = "TAG: receb | Campo: CNPJ-CPF | Informar o CNPJ ou o CPF.";
        } else {
            $this->receb = $this->dom->createElement('receb');
            if (!empty($CNPJ)) $this->setCampo($this->receb, 'CNPJ', $CNPJ, true, true);
            if (!empty($CPF)) $this->setCampo($this->receb, 'CPF', $CPF, true, true);
            $this->setCampo($this->receb, 'IE', $IE, false, true);
            $this->setCampo($this->receb, 'xNome', $xNome, true, true);
            $this->setCampo($this->receb, 'fone', $fone, false, true);
            $this->setCampo($this->receb, 'email', $email, false, true);
            $enderReceb = $this->dom->createElement('enderReceb');
            $this->TEndereco($enderReceb, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $CEP, $UF, $cPais, $xPais);
            $this->receb->appendChild($enderReceb);
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setDestinatario($CNPJ = null, $CPF = null, $IE = null, $xNome = null, $xFant = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $CEP = null, $UF = null, $cPais = null, $xPais = null, $fone = null, $email = null){
        if ((empty($CNPJ) && empty($CPF)) || (!empty($CNPJ) && !empty($CPF))){
            $this->erros[] = "TAG: rem | Campo: CNPJ-CPF | Informar o CNPJ ou o CPF.";
        } else {
            $this->dest = $this->dom->createElement('dest');
            $this->setCampo($this->dest, 'toma', 4, true, true);
            if (!empty($CNPJ)) $this->setCampo($this->dest, 'CNPJ', $CNPJ, true, true);
            if (!empty($CPF)) $this->setCampo($this->dest, 'CPF', $CPF, true, true);
            $this->setCampo($this->dest, 'IE', $IE, false, true);
            $this->setCampo($this->dest, 'xNome', $xNome, true, true);
            $this->setCampo($this->dest, 'xFant', $xFant, true, true);
            $this->setCampo($this->dest, 'fone', $fone, false, true);
            $enderDest = $this->dom->createElement('enderDest');
            $this->TEndereco($enderDest, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $CEP, $UF, $cPais, $xPais);
            $this->dest->appendChild($enderDest);
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setLocalEntrega($CNPJ = null, $CPF = null, $xNome = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $UF = null){
        if (is_null($this->dest)){
            $this->erros[] = "Não é possível definir o local de entrega sem definir a TAG de destinatário.";
        } else {
            $locEnt = $this->dom->createElement('locEnt');
            $this->TEndReEnt($locEnt, $CNPJ, $CPF, $xNome, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF);
            $this->dest->appendChild($locEnt);
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setValorPrestacao($vTPrest = null, $vRec = null, $Comp = array()){
        $this->vPrest = $this->dom->createElement('vPrest');
        $this->setCampo($this->vPrest, 'vTPrest', $vTPrest, true, true);
        $this->setCampo($this->vPrest, 'vRec', $vRec, true, true);
        foreach ($Comp as $xNome => $vComp){
            $tagComp = $this->dom->createElement('Comp');
            $this->setCampo($tagComp, 'vTPrest', $xNome, true, true);
            $this->setCampo($tagComp, 'vComp', $vComp, true, true);
            $this->vPrest->appendChild($tagComp);
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setICMS($CST = null, $pRedBC = null, $vBC = null, $pICMS = null, $vICMS = null, $vBCSTRet = null, $vICMSSTRet = null, $pICMSSTRet = null, $vCred = null, $pRedBCOutraUF = null, $vBCOutraUF = null, $pICMSOutraUF = null, $vICMSOutraUF = null){
        $this->ICMS = $this->dom->createElement('ICMS');
        switch ($CST) {
            case '00':
                $icms = $this->dom->createElement('ICMS00');
                $this->setCampo($icms, 'CST', $CST, true, true);
                $this->setCampo($icms, 'vBC', $vBC, true, true);
                $this->setCampo($icms, 'pICMS', $pICMS, true, true);
                $this->setCampo($icms, 'vICMS', $vICMS, true, true);
                $this->ICMS->appendChild($icms);
                break;
            
            case '20':
                $icms = $this->dom->createElement('ICMS20');
                $this->setCampo($icms, 'CST', $CST, true, true);
                $this->setCampo($icms, 'pRedBC', $pRedBC, true, true);
                $this->setCampo($icms, 'vBC', $vBC, true, true);
                $this->setCampo($icms, 'pICMS', $pICMS, true, true);
                $this->setCampo($icms, 'vICMS', $vICMS, true, true);
                $this->ICMS->appendChild($icms);
                break;
            
            case '40':
            case '41':
            case '51':
                $icms = $this->dom->createElement('ICMS45');
                $this->setCampo($icms, 'CST', $CST, true, true);
                $this->ICMS->appendChild($icms);
                break;
            
            case '60':
                $icms = $this->dom->createElement('ICMS60');
                $this->setCampo($icms, 'CST', $CST, true, true);
                $this->setCampo($icms, 'vBCSTRet', $vBCSTRet, true, true);
                $this->setCampo($icms, 'vICMSSTRet', $vICMSSTRet, true, true);
                $this->setCampo($icms, 'pICMSSTRet', $pICMSSTRet, true, true);
                $this->setCampo($icms, 'vCred', $vCred, true, true);
                $this->ICMS->appendChild($icms);
                break;
            
            case '90':
                $icms = $this->dom->createElement('ICMS20');
                $this->setCampo($icms, 'CST', $CST, true, true);
                $this->setCampo($icms, 'pRedBC', $pRedBC, true, true);
                $this->setCampo($icms, 'vBC', $vBC, true, true);
                $this->setCampo($icms, 'pICMS', $pICMS, true, true);
                $this->setCampo($icms, 'vICMS', $vICMS, true, true);
                $this->setCampo($icms, 'vCred', $vCred, true, true);
                $this->ICMS->appendChild($icms);
                
                // VERIFICA NECESSIDADE ST
                if ($vBCOutraUF!='' || $pICMSOutraUF!='' || $vICMSOutraUF!=''){
                    $icms = $this->dom->createElement('ICMSOutraUF');
                    $this->setCampo($icms, 'CST', $CST, true, true);
                    $this->setCampo($icms, 'pRedBCOutraUF', $pRedBCOutraUF, false, false);
                    $this->setCampo($icms, 'vBCOutraUF', $vBCOutraUF, true, true);
                    $this->setCampo($icms, 'pICMSOutraUF', $pICMSOutraUF, true, true);
                    $this->setCampo($icms, 'vICMSOutraUF', $vICMSOutraUF, true, true);
                    $this->ICMS->appendChild($icms);
                }
                break;
            
            default:
                $this->erros[] = "TAG: icms | CST não reconhecido.";
                break;
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setICMSSN(){
        $this->ICMS = $this->dom->createElement('ICMSSN');
        $indSN = $this->dom->createElement('indSN', 1);
        $this->ICMS->appendChild($indSN);
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    public function setImposto($vTotTrib = null, $infAdFisco = null){
        $this->imp = $this->dom->createElement('imp');
        $this->setCampo($this->imp, 'vTotTrib', $vTotTrib, true, true);
        $this->setCampo($this->imp, 'infAdFisco', $infAdFisco, false, false);
        if (!is_null($this->ICMS)){
            $this->imp->appendChild($this->ICMS);
        } elseif (!is_null($this->ICMSSN)){
            $this->imp->appendChild($this->ICMSSN);
        } else {
            $this->erros[] = "TAG: imp | Campo: ICMS | Você não definiu ICMS ou ICMSSN.";
        }
        
        if ($this->hasError()){
            $this->debug();
            return false;
        } else {
            return true;
        }
    }
    
    private function TEndereco($tag, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $CEP = null, $UF = null, $cPais = null, $xPais = null){
        $this->setCampo($tag, 'xLgr', $xLgr, true, true);
        $this->setCampo($tag, 'nro', $nro, true, true);
        $this->setCampo($tag, 'xCpl', $xCpl, false, false);
        $this->setCampo($tag, 'xBairro', $xBairro, false, false);
        $this->setCampo($tag, 'cMun', $cMun, true, true);
        $this->setCampo($tag, 'xMun', $xMun, true, true);
        $this->setCampo($tag, 'CEP', $CEP, true, true);
        $this->setCampo($tag, 'UF', $UF, true, true);
        if (!empty($cPais)) $this->setCampo($tag, 'cPais', $cPais, false, false);
        if (!empty($xPais)) $this->setCampo($tag, 'xPais', $xPais, false, false);
    }
    
    private function TEndReEnt($tag, $CNPJ = null, $CPF = null, $xNome = null, $xLgr = null, $nro = null, $xCpl = null, $xBairro = null, $cMun = null, $xMun = null, $UF = null){
        if ((empty($CNPJ) && empty($CPF)) || (!empty($CNPJ) && !empty($CPF))){
            $this->erros[] = "TAG: ".$tag->nodeName." | Campo: CNPJ-CPF | Informar o CNPJ ou o CPF.";
        } else {
            if (!empty($CNPJ)) $this->setCampo($tag, 'CNPJ', $CNPJ, false, false);
            if (!empty($CPF)) $this->setCampo($tag, 'CPF', $CPF, false, false);
            $this->setCampo($tag, 'xNome', $xNome, true, true);
            $this->setCampo($tag, 'xLgr', $xLgr, true, true);
            $this->setCampo($tag, 'nro', $nro, true, true);
            $this->setCampo($tag, 'xCpl', $xCpl, false, false);
            $this->setCampo($tag, 'xBairro', $xBairro, false, false);
            $this->setCampo($tag, 'cMun', $cMun, true, true);
            $this->setCampo($tag, 'xMun', $xMun, true, true);
            $this->setCampo($tag, 'UF', $UF, true, true);
        }
    }
    
    private function setCampo($node, $campo, $valor='', $obrigatorio=true, $forcar=false){
        $valido = true;
        if (($obrigatorio) && ($valor=='' || is_null($valor))){
            $valido = false;
        }
        if ($valido){
            if ($valor=='' || is_null($valor)){
                $valor = null;
                if ($forcar){
                    $tag = $this->dom->createElement($campo, $valor);
                    $node->appendChild($tag);
                }
            } else {
                $tag = $this->dom->createElement($campo, $valor);
                $node->appendChild($tag);
            }
        } else {
            $this->erros[] = "TAG: {$node->nodeName} | Campo: {$campo} | Preenchimento obrigatorio.";
        }
    }
    
    private function hasError(){
        $erros = count($this->erros);
        if ($erros == 0){
            return false;
        } else {
            return true;
        }
    }
    
    private function debug(){
        $erros = count($this->erros);
        if ($erros>0 && $this->debug) {
            throw new Exception("Erros: " . implode("\n", $this->erros));
        }
    }
    
}

