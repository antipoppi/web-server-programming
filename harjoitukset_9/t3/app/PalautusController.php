<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PalautusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* -------------------------------*/
    // palautuslomakkeen näyttäminen
    /* -------------------------------*/
    function showForm(Request $request)
    {
    $hnro = $request->input('id');

    $PDO = DB::connection('mysql')->getPdo();

    $sql = <<< SQLEND
    SELECT *
    FROM tspec
    WHERE hnro = :hnro
SQLEND;

    $allsql = $PDO->prepare($sql);
    $allsql->bindParam(':hnro', $hnro, \PDO::PARAM_INT);
    $allsql->execute();
    $harkkatehtavat = $allsql->fetchAll((\PDO::FETCH_OBJ));
    
    return view('addscoreform')->with('harkkatehtavat', $harkkatehtavat)->with('hnro', $hnro);
    }

    /* -------------------------------*/
    // tulosten lisääminen tietokantaan
    /* -------------------------------*/
    function addScores(Request $request)
    {
        $student_id = Auth::id();
        $tehtavat = $request->except('_token', 'url', 'hnro');
        $hnro = $request->input('hnro');
        $url = $request->input('url');
        // jos url puuttuu, ilmoitetaan siitä
        if ($url == null) {
            $errorMessage = 'Pistä URL!';
            return redirect()->back()->with('info_msg',"$errorMessage");
        }

        // tarkistetaan onko tuloksia laitettu ennestään
        $PDO = DB::connection('mysql')->getPdo();
        $sql = <<< SQLEND
    SELECT *
    FROM tpalautus
    WHERE student_id = :student_id
    AND hnro = :hnro
SQLEND;
        $allsql = $PDO->prepare($sql);
        $allsql->bindParam(':student_id', $student_id, \PDO::PARAM_INT);
        $allsql->bindParam(':hnro', $hnro, \PDO::PARAM_INT);
        $allsql->execute();
        $palautus = $allsql->fetchAll((\PDO::FETCH_OBJ));
        
        if (!empty($palautus)) {
            $errorMessage = 'Olet palauttanut jo nämä tehtävät';
            return redirect()->back()->with('info_msg',"$errorMessage");
        }

        // jos ei ole palautettu ennestään, jatketaan
        //$PDO = DB::connection('mysql')->getPdo();
        DB::beginTransaction();

        for ($i = 1; $i <= count($tehtavat); $i++) {
            // Yritetään tallentaa rivin tietoja
            $arvosana = $tehtavat[$i];
            $tnro = $i;
            if (!is_numeric($arvosana)) {
                
                DB::rollback();
                $errorMessage = 'Et valinnut kaikkiin tehtäviin arvosanaa!';
                return redirect()->back()->with('info_msg',"$errorMessage");
            }
            else {
                try
                {
                    $sql = "INSERT INTO tpalautus (student_id, hnro, tnro, initpoints, url) VALUES(:f1,:f2,:f3,:f4,:f5)";
                    $insertsql = $PDO->prepare($sql);
                    $insertsql->execute(array(':f1' => $student_id, ':f2' => $hnro, ':f3' => $tnro, ':f4' => $arvosana, ':f5' => $url));
                }
                // Jos ongelmia, peruutetaan
                catch(\Exception $e)
                {
                    DB::rollback();

                    if ($e instanceof \PDOException) {

                        $dbCode = trim($e->getCode());
                        //Codes specific to mysql errors
                        switch ($dbCode)
                        {
                            // 23000 = Integrity constraint violation eli esim sama PK kuin jo olemassa olevalla tietueella
                            case 23000:
                                $errorMessage = 'Tietokantaongelma: Yritit ehkä tallentaa samoja harjoituksia toiseen kertaan?';
                                break;
                            default:
                                $errorMessage = 'Tietokantaan tallentamisessa ongelmia';

                        }

                    // Ei lisätty yhtään tietuetta (koska rollback), palataan lisäyslomakkeeseen,
                    // jossa näytetään virheviesti
                    return redirect()->back()->with('info_msg',"$errorMessage");

                    }
                }
            }
        }
        // Hyväksytään kaikki rivit tietokantaan, palataan lomakesivulle ja näytetään viesti onnistumisesta
        DB::commit();
        return redirect()->back()->with('info_msg', 'Kaikki arvosanat tallennettiin onnistuneesti');
        
    }
}
