<?php

class ObjGenKonten
{

  private  $id;
  private  $bezeichnung;
  private  $kurzbezeichnung;
  private  $type;
  private  $erstezeile;
  private  $datevkonto;
  private  $blz;
  private  $konto;
  private  $swift;
  private  $iban;
  private  $lastschrift;
  private  $hbci;
  private  $hbcikennung;
  private  $inhaber;
  private  $aktiv;
  private  $keineemail;
  private  $firma;
  private  $schreibbar;
  private  $liveimport;
  private  $liveimport_online;
  private  $importtrennzeichen;
  private  $importdatenmaskierung;
  private  $importfelddatum;
  private  $importfelddatumformat;
  private  $importfeldbetrag;
  private  $importfeldbetragformat;
  private  $importfeldbuchungstext;
  private  $importfeldbuchungstextformat;
  private  $importfeldwaehrung;
  private  $importfeldwaehrungformat;
  private  $importfelddatumformatausgabe;
  private  $importerstezeilenummer;
  private  $glaeubiger;
  private  $codierung;
  private  $importfeldhabensollkennung;
  private  $importfeldkennunghaben;
  private  $importfeldkennungsoll;
  private  $importextrahabensoll;
  private  $importfeldhaben;
  private  $importfeldsoll;
  private  $importletztenzeilenignorieren;

  public $app;            //application object 

  public function ObjGenKonten($app)
  {
    $this->app = $app;
  }

  public function Select($id)
  {
    if(is_numeric($id))
      $result = $this->app->DB->SelectArr("SELECT * FROM konten WHERE (id = '$id')");
    else
      return -1;

$result = $result[0];

    $this->id=$result[id];
    $this->bezeichnung=$result[bezeichnung];
    $this->kurzbezeichnung=$result[kurzbezeichnung];
    $this->type=$result[type];
    $this->erstezeile=$result[erstezeile];
    $this->datevkonto=$result[datevkonto];
    $this->blz=$result[blz];
    $this->konto=$result[konto];
    $this->swift=$result[swift];
    $this->iban=$result[iban];
    $this->lastschrift=$result[lastschrift];
    $this->hbci=$result[hbci];
    $this->hbcikennung=$result[hbcikennung];
    $this->inhaber=$result[inhaber];
    $this->aktiv=$result[aktiv];
    $this->keineemail=$result[keineemail];
    $this->firma=$result[firma];
    $this->schreibbar=$result[schreibbar];
    $this->liveimport=$result[liveimport];
    $this->liveimport_online=$result[liveimport_online];
    $this->importtrennzeichen=$result[importtrennzeichen];
    $this->importdatenmaskierung=$result[importdatenmaskierung];
    $this->importfelddatum=$result[importfelddatum];
    $this->importfelddatumformat=$result[importfelddatumformat];
    $this->importfeldbetrag=$result[importfeldbetrag];
    $this->importfeldbetragformat=$result[importfeldbetragformat];
    $this->importfeldbuchungstext=$result[importfeldbuchungstext];
    $this->importfeldbuchungstextformat=$result[importfeldbuchungstextformat];
    $this->importfeldwaehrung=$result[importfeldwaehrung];
    $this->importfeldwaehrungformat=$result[importfeldwaehrungformat];
    $this->importfelddatumformatausgabe=$result[importfelddatumformatausgabe];
    $this->importerstezeilenummer=$result[importerstezeilenummer];
    $this->glaeubiger=$result[glaeubiger];
    $this->codierung=$result[codierung];
    $this->importfeldhabensollkennung=$result[importfeldhabensollkennung];
    $this->importfeldkennunghaben=$result[importfeldkennunghaben];
    $this->importfeldkennungsoll=$result[importfeldkennungsoll];
    $this->importextrahabensoll=$result[importextrahabensoll];
    $this->importfeldhaben=$result[importfeldhaben];
    $this->importfeldsoll=$result[importfeldsoll];
    $this->importletztenzeilenignorieren=$result[importletztenzeilenignorieren];
  }

  public function Create()
  {
    $sql = "INSERT INTO konten (id,bezeichnung,kurzbezeichnung,type,erstezeile,datevkonto,blz,konto,swift,iban,lastschrift,hbci,hbcikennung,inhaber,aktiv,keineemail,firma,schreibbar,liveimport,liveimport_online,importtrennzeichen,importdatenmaskierung,importfelddatum,importfelddatumformat,importfeldbetrag,importfeldbetragformat,importfeldbuchungstext,importfeldbuchungstextformat,importfeldwaehrung,importfeldwaehrungformat,importfelddatumformatausgabe,importerstezeilenummer,glaeubiger,codierung,importfeldhabensollkennung,importfeldkennunghaben,importfeldkennungsoll,importextrahabensoll,importfeldhaben,importfeldsoll,importletztenzeilenignorieren)
      VALUES('','{$this->bezeichnung}','{$this->kurzbezeichnung}','{$this->type}','{$this->erstezeile}','{$this->datevkonto}','{$this->blz}','{$this->konto}','{$this->swift}','{$this->iban}','{$this->lastschrift}','{$this->hbci}','{$this->hbcikennung}','{$this->inhaber}','{$this->aktiv}','{$this->keineemail}','{$this->firma}','{$this->schreibbar}','{$this->liveimport}','{$this->liveimport_online}','{$this->importtrennzeichen}','{$this->importdatenmaskierung}','{$this->importfelddatum}','{$this->importfelddatumformat}','{$this->importfeldbetrag}','{$this->importfeldbetragformat}','{$this->importfeldbuchungstext}','{$this->importfeldbuchungstextformat}','{$this->importfeldwaehrung}','{$this->importfeldwaehrungformat}','{$this->importfelddatumformatausgabe}','{$this->importerstezeilenummer}','{$this->glaeubiger}','{$this->codierung}','{$this->importfeldhabensollkennung}','{$this->importfeldkennunghaben}','{$this->importfeldkennungsoll}','{$this->importextrahabensoll}','{$this->importfeldhaben}','{$this->importfeldsoll}','{$this->importletztenzeilenignorieren}')"; 

    $this->app->DB->Insert($sql);
    $this->id = $this->app->DB->GetInsertID();
  }

  public function Update()
  {
    if(!is_numeric($this->id))
      return -1;

    $sql = "UPDATE konten SET
      bezeichnung='{$this->bezeichnung}',
      kurzbezeichnung='{$this->kurzbezeichnung}',
      type='{$this->type}',
      erstezeile='{$this->erstezeile}',
      datevkonto='{$this->datevkonto}',
      blz='{$this->blz}',
      konto='{$this->konto}',
      swift='{$this->swift}',
      iban='{$this->iban}',
      lastschrift='{$this->lastschrift}',
      hbci='{$this->hbci}',
      hbcikennung='{$this->hbcikennung}',
      inhaber='{$this->inhaber}',
      aktiv='{$this->aktiv}',
      keineemail='{$this->keineemail}',
      firma='{$this->firma}',
      schreibbar='{$this->schreibbar}',
      liveimport='{$this->liveimport}',
      liveimport_online='{$this->liveimport_online}',
      importtrennzeichen='{$this->importtrennzeichen}',
      importdatenmaskierung='{$this->importdatenmaskierung}',
      importfelddatum='{$this->importfelddatum}',
      importfelddatumformat='{$this->importfelddatumformat}',
      importfeldbetrag='{$this->importfeldbetrag}',
      importfeldbetragformat='{$this->importfeldbetragformat}',
      importfeldbuchungstext='{$this->importfeldbuchungstext}',
      importfeldbuchungstextformat='{$this->importfeldbuchungstextformat}',
      importfeldwaehrung='{$this->importfeldwaehrung}',
      importfeldwaehrungformat='{$this->importfeldwaehrungformat}',
      importfelddatumformatausgabe='{$this->importfelddatumformatausgabe}',
      importerstezeilenummer='{$this->importerstezeilenummer}',
      glaeubiger='{$this->glaeubiger}',
      codierung='{$this->codierung}',
      importfeldhabensollkennung='{$this->importfeldhabensollkennung}',
      importfeldkennunghaben='{$this->importfeldkennunghaben}',
      importfeldkennungsoll='{$this->importfeldkennungsoll}',
      importextrahabensoll='{$this->importextrahabensoll}',
      importfeldhaben='{$this->importfeldhaben}',
      importfeldsoll='{$this->importfeldsoll}',
      importletztenzeilenignorieren='{$this->importletztenzeilenignorieren}'
      WHERE (id='{$this->id}')";

    $this->app->DB->Update($sql);
  }

  public function Delete($id="")
  {
    if(is_numeric($id))
    {
      $this->id=$id;
    }
    else
      return -1;

    $sql = "DELETE FROM konten WHERE (id='{$this->id}')";
    $this->app->DB->Delete($sql);

    $this->id="";
    $this->bezeichnung="";
    $this->kurzbezeichnung="";
    $this->type="";
    $this->erstezeile="";
    $this->datevkonto="";
    $this->blz="";
    $this->konto="";
    $this->swift="";
    $this->iban="";
    $this->lastschrift="";
    $this->hbci="";
    $this->hbcikennung="";
    $this->inhaber="";
    $this->aktiv="";
    $this->keineemail="";
    $this->firma="";
    $this->schreibbar="";
    $this->liveimport="";
    $this->liveimport_online="";
    $this->importtrennzeichen="";
    $this->importdatenmaskierung="";
    $this->importfelddatum="";
    $this->importfelddatumformat="";
    $this->importfeldbetrag="";
    $this->importfeldbetragformat="";
    $this->importfeldbuchungstext="";
    $this->importfeldbuchungstextformat="";
    $this->importfeldwaehrung="";
    $this->importfeldwaehrungformat="";
    $this->importfelddatumformatausgabe="";
    $this->importerstezeilenummer="";
    $this->glaeubiger="";
    $this->codierung="";
    $this->importfeldhabensollkennung="";
    $this->importfeldkennunghaben="";
    $this->importfeldkennungsoll="";
    $this->importextrahabensoll="";
    $this->importfeldhaben="";
    $this->importfeldsoll="";
    $this->importletztenzeilenignorieren="";
  }

  public function Copy()
  {
    $this->id = "";
    $this->Create();
  }

 /** 
   Mit dieser Funktion kann man einen Datensatz suchen 
   dafuer muss man die Attribute setzen nach denen gesucht werden soll
   dann kriegt man als ergebnis den ersten Datensatz der auf die Suche uebereinstimmt
   zurueck. Mit Next() kann man sich alle weiteren Ergebnisse abholen
   **/ 

  public function Find()
  {
    //TODO Suche mit den werten machen
  }

  public function FindNext()
  {
    //TODO Suche mit den alten werten fortsetzen machen
  }

 /** Funktionen um durch die Tabelle iterieren zu koennen */ 

  public function Next()
  {
    //TODO: SQL Statement passt nach meiner Meinung nach noch nicht immer
  }

  public function First()
  {
    //TODO: SQL Statement passt nach meiner Meinung nach noch nicht immer
  }

 /** dank dieser funktionen kann man die tatsaechlichen werte einfach 
  ueberladen (in einem Objekt das mit seiner klasse ueber dieser steht)**/ 

  function SetId($value) { $this->id=$value; }
  function GetId() { return $this->id; }
  function SetBezeichnung($value) { $this->bezeichnung=$value; }
  function GetBezeichnung() { return $this->bezeichnung; }
  function SetKurzbezeichnung($value) { $this->kurzbezeichnung=$value; }
  function GetKurzbezeichnung() { return $this->kurzbezeichnung; }
  function SetType($value) { $this->type=$value; }
  function GetType() { return $this->type; }
  function SetErstezeile($value) { $this->erstezeile=$value; }
  function GetErstezeile() { return $this->erstezeile; }
  function SetDatevkonto($value) { $this->datevkonto=$value; }
  function GetDatevkonto() { return $this->datevkonto; }
  function SetBlz($value) { $this->blz=$value; }
  function GetBlz() { return $this->blz; }
  function SetKonto($value) { $this->konto=$value; }
  function GetKonto() { return $this->konto; }
  function SetSwift($value) { $this->swift=$value; }
  function GetSwift() { return $this->swift; }
  function SetIban($value) { $this->iban=$value; }
  function GetIban() { return $this->iban; }
  function SetLastschrift($value) { $this->lastschrift=$value; }
  function GetLastschrift() { return $this->lastschrift; }
  function SetHbci($value) { $this->hbci=$value; }
  function GetHbci() { return $this->hbci; }
  function SetHbcikennung($value) { $this->hbcikennung=$value; }
  function GetHbcikennung() { return $this->hbcikennung; }
  function SetInhaber($value) { $this->inhaber=$value; }
  function GetInhaber() { return $this->inhaber; }
  function SetAktiv($value) { $this->aktiv=$value; }
  function GetAktiv() { return $this->aktiv; }
  function SetKeineemail($value) { $this->keineemail=$value; }
  function GetKeineemail() { return $this->keineemail; }
  function SetFirma($value) { $this->firma=$value; }
  function GetFirma() { return $this->firma; }
  function SetSchreibbar($value) { $this->schreibbar=$value; }
  function GetSchreibbar() { return $this->schreibbar; }
  function SetLiveimport($value) { $this->liveimport=$value; }
  function GetLiveimport() { return $this->liveimport; }
  function SetLiveimport_Online($value) { $this->liveimport_online=$value; }
  function GetLiveimport_Online() { return $this->liveimport_online; }
  function SetImporttrennzeichen($value) { $this->importtrennzeichen=$value; }
  function GetImporttrennzeichen() { return $this->importtrennzeichen; }
  function SetImportdatenmaskierung($value) { $this->importdatenmaskierung=$value; }
  function GetImportdatenmaskierung() { return $this->importdatenmaskierung; }
  function SetImportfelddatum($value) { $this->importfelddatum=$value; }
  function GetImportfelddatum() { return $this->importfelddatum; }
  function SetImportfelddatumformat($value) { $this->importfelddatumformat=$value; }
  function GetImportfelddatumformat() { return $this->importfelddatumformat; }
  function SetImportfeldbetrag($value) { $this->importfeldbetrag=$value; }
  function GetImportfeldbetrag() { return $this->importfeldbetrag; }
  function SetImportfeldbetragformat($value) { $this->importfeldbetragformat=$value; }
  function GetImportfeldbetragformat() { return $this->importfeldbetragformat; }
  function SetImportfeldbuchungstext($value) { $this->importfeldbuchungstext=$value; }
  function GetImportfeldbuchungstext() { return $this->importfeldbuchungstext; }
  function SetImportfeldbuchungstextformat($value) { $this->importfeldbuchungstextformat=$value; }
  function GetImportfeldbuchungstextformat() { return $this->importfeldbuchungstextformat; }
  function SetImportfeldwaehrung($value) { $this->importfeldwaehrung=$value; }
  function GetImportfeldwaehrung() { return $this->importfeldwaehrung; }
  function SetImportfeldwaehrungformat($value) { $this->importfeldwaehrungformat=$value; }
  function GetImportfeldwaehrungformat() { return $this->importfeldwaehrungformat; }
  function SetImportfelddatumformatausgabe($value) { $this->importfelddatumformatausgabe=$value; }
  function GetImportfelddatumformatausgabe() { return $this->importfelddatumformatausgabe; }
  function SetImporterstezeilenummer($value) { $this->importerstezeilenummer=$value; }
  function GetImporterstezeilenummer() { return $this->importerstezeilenummer; }
  function SetGlaeubiger($value) { $this->glaeubiger=$value; }
  function GetGlaeubiger() { return $this->glaeubiger; }
  function SetCodierung($value) { $this->codierung=$value; }
  function GetCodierung() { return $this->codierung; }
  function SetImportfeldhabensollkennung($value) { $this->importfeldhabensollkennung=$value; }
  function GetImportfeldhabensollkennung() { return $this->importfeldhabensollkennung; }
  function SetImportfeldkennunghaben($value) { $this->importfeldkennunghaben=$value; }
  function GetImportfeldkennunghaben() { return $this->importfeldkennunghaben; }
  function SetImportfeldkennungsoll($value) { $this->importfeldkennungsoll=$value; }
  function GetImportfeldkennungsoll() { return $this->importfeldkennungsoll; }
  function SetImportextrahabensoll($value) { $this->importextrahabensoll=$value; }
  function GetImportextrahabensoll() { return $this->importextrahabensoll; }
  function SetImportfeldhaben($value) { $this->importfeldhaben=$value; }
  function GetImportfeldhaben() { return $this->importfeldhaben; }
  function SetImportfeldsoll($value) { $this->importfeldsoll=$value; }
  function GetImportfeldsoll() { return $this->importfeldsoll; }
  function SetImportletztenzeilenignorieren($value) { $this->importletztenzeilenignorieren=$value; }
  function GetImportletztenzeilenignorieren() { return $this->importletztenzeilenignorieren; }

}

?>