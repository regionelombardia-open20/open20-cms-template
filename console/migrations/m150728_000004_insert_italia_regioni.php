<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\basic\template
 * @category   CategoryName
 */

class m150728_000004_insert_italia_regioni extends \yii\db\Migration
{
/*
    const TABLE = '{{%italia_regioni}}'; 

    public function safeUp()
    {
        $this->insert(self::TABLE, ['id' => 1, 'nome' => "Marche"]);
        $this->insert(self::TABLE, ['id' => 2, 'nome' => "Abruzzo"]);
        $this->insert(self::TABLE, ['id' => 3, 'nome' => "Basilicata"]);
        $this->insert(self::TABLE, ['id' => 4, 'nome' => "Molise"]);
        $this->insert(self::TABLE, ['id' => 5, 'nome' => "Trentino Alto Adige"]);
        $this->insert(self::TABLE, ['id' => 6, 'nome' => "Puglia"]);
        $this->insert(self::TABLE, ['id' => 7, 'nome' => "Calabria"]);
        $this->insert(self::TABLE, ['id' => 8, 'nome' => "Campania"]);
        $this->insert(self::TABLE, ['id' => 9, 'nome' => "Lazio"]);
        $this->insert(self::TABLE, ['id' => 10, 'nome' => "Sardegna"]);
        $this->insert(self::TABLE, ['id' => 11, 'nome' => "Sicilia"]);
        $this->insert(self::TABLE, ['id' => 12, 'nome' => "Toscana"]);
        $this->insert(self::TABLE, ['id' => 13, 'nome' => "Piemonte"]);
        $this->insert(self::TABLE, ['id' => 14, 'nome' => "Emilia Romagna"]);
        $this->insert(self::TABLE, ['id' => 15, 'nome' => "Friuli Venezia Giulia"]);
        $this->insert(self::TABLE, ['id' => 16, 'nome' => "Valle d'Aosta"]);
        $this->insert(self::TABLE, ['id' => 17, 'nome' => "Veneto"]);
        $this->insert(self::TABLE, ['id' => 18, 'nome' => "Liguria"]);
        $this->insert(self::TABLE, ['id' => 19, 'nome' => "Lombardia"]);
        $this->insert(self::TABLE, ['id' => 20, 'nome' => "Umbria"]);
        $this->insert(self::TABLE, ['id' => 21, 'nome' => "Baden Württemberg"]);
        $this->insert(self::TABLE, ['id' => 22, 'nome' => "Baviera"]);
        $this->insert(self::TABLE, ['id' => 23, 'nome' => "Saarland"]);
        $this->insert(self::TABLE, ['id' => 24, 'nome' => "Renania-Palatinato"]);
        $this->insert(self::TABLE, ['id' => 25, 'nome' => "Assia"]);
        $this->insert(self::TABLE, ['id' => 26, 'nome' => "Turingia"]);
        $this->insert(self::TABLE, ['id' => 27, 'nome' => "Sassonia"]);
        $this->insert(self::TABLE, ['id' => 28, 'nome' => "Renania Settentrionale Vestfalia"]);
        $this->insert(self::TABLE, ['id' => 29, 'nome' => "Bassa Sassonia"]);
        $this->insert(self::TABLE, ['id' => 30, 'nome' => "Sassonia Anhalt"]);
        $this->insert(self::TABLE, ['id' => 31, 'nome' => "Brandeburgo"]);
        $this->insert(self::TABLE, ['id' => 32, 'nome' => "Berlino"]);
        $this->insert(self::TABLE, ['id' => 33, 'nome' => "Schleswig-Holstein"]);
        $this->insert(self::TABLE, ['id' => 34, 'nome' => "Amburgo"]);
        $this->insert(self::TABLE, ['id' => 35, 'nome' => "Vorpommern"]);
        $this->insert(self::TABLE, ['id' => 39, 'nome' => "Istria"]);
        $this->insert(self::TABLE, ['id' => 40, 'nome' => "Dalmazia"]);
        $this->insert(self::TABLE, ['id' => 41, 'nome' => "Bretagne"]);
        $this->insert(self::TABLE, ['id' => 42, 'nome' => "Basse Normandie"]);
        $this->insert(self::TABLE, ['id' => 43, 'nome' => "Haute Normandie"]);
        $this->insert(self::TABLE, ['id' => 44, 'nome' => "Nord Pas de Calais"]);
        $this->insert(self::TABLE, ['id' => 45, 'nome' => "Piccardia"]);
        $this->insert(self::TABLE, ['id' => 46, 'nome' => "Ile de France"]);
        $this->insert(self::TABLE, ['id' => 47, 'nome' => "Pays de Loire"]);
        $this->insert(self::TABLE, ['id' => 48, 'nome' => "Centre"]);
        $this->insert(self::TABLE, ['id' => 49, 'nome' => "Alsazia"]);
        $this->insert(self::TABLE, ['id' => 50, 'nome' => "Champagne Ardenne"]);
        $this->insert(self::TABLE, ['id' => 51, 'nome' => "Borgogna"]);
        $this->insert(self::TABLE, ['id' => 52, 'nome' => "Franca Contea"]);
        $this->insert(self::TABLE, ['id' => 53, 'nome' => "Limosino"]);
        $this->insert(self::TABLE, ['id' => 54, 'nome' => "Alvernia"]);
        $this->insert(self::TABLE, ['id' => 55, 'nome' => "Rhône Alpes"]);
        $this->insert(self::TABLE, ['id' => 56, 'nome' => "Poitou Charentes"]);
        $this->insert(self::TABLE, ['id' => 57, 'nome' => "Aquitania"]);
        $this->insert(self::TABLE, ['id' => 58, 'nome' => "Midi-Pyrénées"]);
        $this->insert(self::TABLE, ['id' => 59, 'nome' => "Languedoc Roussillon"]);
        $this->insert(self::TABLE, ['id' => 60, 'nome' => "Provenza-Alpi-Costa Azzurra"]);
        $this->insert(self::TABLE, ['id' => 61, 'nome' => "Corsica"]);
        $this->insert(self::TABLE, ['id' => 62, 'nome' => "Lorena"]);
        $this->insert(self::TABLE, ['id' => 63, 'nome' => "Isole Baleari"]);
        $this->insert(self::TABLE, ['id' => 64, 'nome' => "Catalogna"]);
        $this->insert(self::TABLE, ['id' => 65, 'nome' => "Aragona"]);
        $this->insert(self::TABLE, ['id' => 66, 'nome' => "Valencia"]);
        $this->insert(self::TABLE, ['id' => 67, 'nome' => "Murcia"]);
        $this->insert(self::TABLE, ['id' => 68, 'nome' => "Andalusia"]);
        $this->insert(self::TABLE, ['id' => 69, 'nome' => "Estremadura"]);
        $this->insert(self::TABLE, ['id' => 70, 'nome' => "Galizia"]);
        $this->insert(self::TABLE, ['id' => 71, 'nome' => "Asturie"]);
        $this->insert(self::TABLE, ['id' => 72, 'nome' => "Cantabria"]);
        $this->insert(self::TABLE, ['id' => 73, 'nome' => "Paesi Baschi"]);
        $this->insert(self::TABLE, ['id' => 74, 'nome' => "Navarra"]);
        $this->insert(self::TABLE, ['id' => 75, 'nome' => "La Rioja"]);
        $this->insert(self::TABLE, ['id' => 76, 'nome' => "Com. Madrid"]);
        $this->insert(self::TABLE, ['id' => 77, 'nome' => "Castiglia"]);
        $this->insert(self::TABLE, ['id' => 78, 'nome' => "Castiglia la Mancha"]);
        $this->insert(self::TABLE, ['id' => 79, 'nome' => "Bruxelles"]);
        $this->insert(self::TABLE, ['id' => 80, 'nome' => "Vallonia"]);
        $this->insert(self::TABLE, ['id' => 81, 'nome' => "Fiandre"]);
        $this->insert(self::TABLE, ['id' => 82, 'nome' => "Scozia"]);
        $this->insert(self::TABLE, ['id' => 83, 'nome' => "Irlanda del Nord"]);
        $this->insert(self::TABLE, ['id' => 84, 'nome' => "Inghilterra"]);
        $this->insert(self::TABLE, ['id' => 85, 'nome' => "Galles"]);
        $this->insert(self::TABLE, ['id' => 86, 'nome' => "Vienna"]);
        $this->insert(self::TABLE, ['id' => 87, 'nome' => "Bassa Austria"]);
        $this->insert(self::TABLE, ['id' => 88, 'nome' => "Alta Austria"]);
        $this->insert(self::TABLE, ['id' => 89, 'nome' => "Salisburgo"]);
        $this->insert(self::TABLE, ['id' => 90, 'nome' => "Tirolo"]);
        $this->insert(self::TABLE, ['id' => 91, 'nome' => "Voralberg"]);
        $this->insert(self::TABLE, ['id' => 92, 'nome' => "Burgenland"]);
        $this->insert(self::TABLE, ['id' => 93, 'nome' => "Stiria"]);
        $this->insert(self::TABLE, ['id' => 94, 'nome' => "Carinzia"]);
        $this->insert(self::TABLE, ['id' => 95, 'nome' => "Andorra"]);
        $this->insert(self::TABLE, ['id' => 96, 'nome' => "Tracia"]);
        $this->insert(self::TABLE, ['id' => 97, 'nome' => "Macedonia"]);
        $this->insert(self::TABLE, ['id' => 98, 'nome' => "Epiro"]);
        $this->insert(self::TABLE, ['id' => 99, 'nome' => "Tessaglia"]);
        $this->insert(self::TABLE, ['id' => 100, 'nome' => "Sterea Elladas"]);
        $this->insert(self::TABLE, ['id' => 101, 'nome' => "Peloponneso"]);
        $this->insert(self::TABLE, ['id' => 102, 'nome' => "Isole Egee"]);
        $this->insert(self::TABLE, ['id' => 103, 'nome' => "Isole Ionie"]);
        $this->insert(self::TABLE, ['id' => 104, 'nome' => "Creta"]);
        $this->insert(self::TABLE, ['id' => 106, 'nome' => "Slovenia"]);
        $this->insert(self::TABLE, ['id' => 108, 'nome' => "Basilea"]);
        $this->insert(self::TABLE, ['id' => 109, 'nome' => "Oberland Bernese"]);
        $this->insert(self::TABLE, ['id' => 110, 'nome' => "Svizzera Centrale"]);
        $this->insert(self::TABLE, ['id' => 111, 'nome' => "Svizzera Orientale"]);
        $this->insert(self::TABLE, ['id' => 112, 'nome' => "Friburgo"]);
        $this->insert(self::TABLE, ['id' => 113, 'nome' => "Ginevra"]);
        $this->insert(self::TABLE, ['id' => 114, 'nome' => "Grigioni"]);
        $this->insert(self::TABLE, ['id' => 115, 'nome' => "Vaud"]);
        $this->insert(self::TABLE, ['id' => 116, 'nome' => "Giura"]);
        $this->insert(self::TABLE, ['id' => 117, 'nome' => "Mittelland Svizzero"]);
        $this->insert(self::TABLE, ['id' => 118, 'nome' => "Ticino"]);
        $this->insert(self::TABLE, ['id' => 119, 'nome' => "Vallese"]);
        $this->insert(self::TABLE, ['id' => 120, 'nome' => "Zurigo"]);
        $this->insert(self::TABLE, ['id' => 121, 'nome' => "Zeeland"]);
        $this->insert(self::TABLE, ['id' => 122, 'nome' => "Zuid-Holland"]);
        $this->insert(self::TABLE, ['id' => 123, 'nome' => "Noord-Holland"]);
        $this->insert(self::TABLE, ['id' => 124, 'nome' => "Flevoland"]);
        $this->insert(self::TABLE, ['id' => 125, 'nome' => "Utrecht"]);
        $this->insert(self::TABLE, ['id' => 126, 'nome' => "Limburg"]);
        $this->insert(self::TABLE, ['id' => 127, 'nome' => "Noord-Brabant"]);
        $this->insert(self::TABLE, ['id' => 128, 'nome' => "Gelderland"]);
        $this->insert(self::TABLE, ['id' => 129, 'nome' => "Overijssel"]);
        $this->insert(self::TABLE, ['id' => 130, 'nome' => "Drenthe"]);
        $this->insert(self::TABLE, ['id' => 131, 'nome' => "Friesland"]);
        $this->insert(self::TABLE, ['id' => 132, 'nome' => "Groningen"]);
        $this->insert(self::TABLE, ['id' => 133, 'nome' => "Akershus"]);
        $this->insert(self::TABLE, ['id' => 134, 'nome' => "Aust-Agder"]);
        $this->insert(self::TABLE, ['id' => 135, 'nome' => "Buskerud"]);
        $this->insert(self::TABLE, ['id' => 136, 'nome' => "Finnmark"]);
        $this->insert(self::TABLE, ['id' => 137, 'nome' => "Hedmark"]);
        $this->insert(self::TABLE, ['id' => 138, 'nome' => "Hordaland"]);
        $this->insert(self::TABLE, ['id' => 139, 'nome' => "Møre og Romsdal"]);
        $this->insert(self::TABLE, ['id' => 140, 'nome' => "Nordland"]);
        $this->insert(self::TABLE, ['id' => 141, 'nome' => "Nord-Trøndelag"]);
        $this->insert(self::TABLE, ['id' => 142, 'nome' => "Oppland"]);
        $this->insert(self::TABLE, ['id' => 143, 'nome' => "Oslo"]);
        $this->insert(self::TABLE, ['id' => 144, 'nome' => "Østfold"]);
        $this->insert(self::TABLE, ['id' => 145, 'nome' => "Rogaland"]);
        $this->insert(self::TABLE, ['id' => 146, 'nome' => "Sogn og Fjordane"]);
        $this->insert(self::TABLE, ['id' => 147, 'nome' => "Sør-Trøndelag"]);
        $this->insert(self::TABLE, ['id' => 148, 'nome' => "Telemark"]);
        $this->insert(self::TABLE, ['id' => 149, 'nome' => "Troms"]);
        $this->insert(self::TABLE, ['id' => 150, 'nome' => "Vest-Agder"]);
        $this->insert(self::TABLE, ['id' => 151, 'nome' => "Vestfold"]);
        $this->insert(self::TABLE, ['id' => 152, 'nome' => "Maramures"]);
        $this->insert(self::TABLE, ['id' => 153, 'nome' => "Bucovinie"]);
        $this->insert(self::TABLE, ['id' => 154, 'nome' => "Crisana"]);
        $this->insert(self::TABLE, ['id' => 155, 'nome' => "Transylvanie"]);
        $this->insert(self::TABLE, ['id' => 156, 'nome' => "Moldavie"]);
        $this->insert(self::TABLE, ['id' => 157, 'nome' => "Banat"]);
        $this->insert(self::TABLE, ['id' => 158, 'nome' => "Oltenie"]);
        $this->insert(self::TABLE, ['id' => 159, 'nome' => "Muntenie"]);
        $this->insert(self::TABLE, ['id' => 160, 'nome' => "Dobrogea"]);      
    }

    public function safeDown()
    {
        $this->delete(self::TABLE, ['id' => 1]);
        $this->delete(self::TABLE, ['id' => 2]);
        $this->delete(self::TABLE, ['id' => 3]);
        $this->delete(self::TABLE, ['id' => 4]);
        $this->delete(self::TABLE, ['id' => 5]);
        $this->delete(self::TABLE, ['id' => 6]);
        $this->delete(self::TABLE, ['id' => 7]);
        $this->delete(self::TABLE, ['id' => 8]);
        $this->delete(self::TABLE, ['id' => 9]);
        $this->delete(self::TABLE, ['id' => 10]);
        $this->delete(self::TABLE, ['id' => 11]);
        $this->delete(self::TABLE, ['id' => 12]);
        $this->delete(self::TABLE, ['id' => 13]);
        $this->delete(self::TABLE, ['id' => 14]);
        $this->delete(self::TABLE, ['id' => 15]);
        $this->delete(self::TABLE, ['id' => 16]);
        $this->delete(self::TABLE, ['id' => 17]);
        $this->delete(self::TABLE, ['id' => 18]);
        $this->delete(self::TABLE, ['id' => 19]);
        $this->delete(self::TABLE, ['id' => 20]);
        $this->delete(self::TABLE, ['id' => 21]);
        $this->delete(self::TABLE, ['id' => 22]);
        $this->delete(self::TABLE, ['id' => 23]);
        $this->delete(self::TABLE, ['id' => 24]);
        $this->delete(self::TABLE, ['id' => 25]);
        $this->delete(self::TABLE, ['id' => 26]);
        $this->delete(self::TABLE, ['id' => 27]);
        $this->delete(self::TABLE, ['id' => 28]);
        $this->delete(self::TABLE, ['id' => 29]);
        $this->delete(self::TABLE, ['id' => 30]);
        $this->delete(self::TABLE, ['id' => 31]);
        $this->delete(self::TABLE, ['id' => 32]);
        $this->delete(self::TABLE, ['id' => 33]);
        $this->delete(self::TABLE, ['id' => 34]);
        $this->delete(self::TABLE, ['id' => 35]);
        $this->delete(self::TABLE, ['id' => 39]);
        $this->delete(self::TABLE, ['id' => 40]);
        $this->delete(self::TABLE, ['id' => 41]);
        $this->delete(self::TABLE, ['id' => 42]);
        $this->delete(self::TABLE, ['id' => 43]);
        $this->delete(self::TABLE, ['id' => 44]);
        $this->delete(self::TABLE, ['id' => 45]);
        $this->delete(self::TABLE, ['id' => 46]);
        $this->delete(self::TABLE, ['id' => 47]);
        $this->delete(self::TABLE, ['id' => 48]);
        $this->delete(self::TABLE, ['id' => 49]);
        $this->delete(self::TABLE, ['id' => 50]);
        $this->delete(self::TABLE, ['id' => 51]);
        $this->delete(self::TABLE, ['id' => 52]);
        $this->delete(self::TABLE, ['id' => 53]);
        $this->delete(self::TABLE, ['id' => 54]);
        $this->delete(self::TABLE, ['id' => 55]);
        $this->delete(self::TABLE, ['id' => 56]);
        $this->delete(self::TABLE, ['id' => 57]);
        $this->delete(self::TABLE, ['id' => 58]);
        $this->delete(self::TABLE, ['id' => 59]);
        $this->delete(self::TABLE, ['id' => 60]);
        $this->delete(self::TABLE, ['id' => 61]);
        $this->delete(self::TABLE, ['id' => 62]);
        $this->delete(self::TABLE, ['id' => 63]);
        $this->delete(self::TABLE, ['id' => 64]);
        $this->delete(self::TABLE, ['id' => 65]);
        $this->delete(self::TABLE, ['id' => 66]);
        $this->delete(self::TABLE, ['id' => 67]);
        $this->delete(self::TABLE, ['id' => 68]);
        $this->delete(self::TABLE, ['id' => 69]);
        $this->delete(self::TABLE, ['id' => 70]);
        $this->delete(self::TABLE, ['id' => 71]);
        $this->delete(self::TABLE, ['id' => 72]);
        $this->delete(self::TABLE, ['id' => 73]);
        $this->delete(self::TABLE, ['id' => 74]);
        $this->delete(self::TABLE, ['id' => 75]);
        $this->delete(self::TABLE, ['id' => 76]);
        $this->delete(self::TABLE, ['id' => 77]);
        $this->delete(self::TABLE, ['id' => 78]);
        $this->delete(self::TABLE, ['id' => 79]);
        $this->delete(self::TABLE, ['id' => 80]);
        $this->delete(self::TABLE, ['id' => 81]);
        $this->delete(self::TABLE, ['id' => 82]);
        $this->delete(self::TABLE, ['id' => 83]);
        $this->delete(self::TABLE, ['id' => 84]);
        $this->delete(self::TABLE, ['id' => 85]);
        $this->delete(self::TABLE, ['id' => 86]);
        $this->delete(self::TABLE, ['id' => 87]);
        $this->delete(self::TABLE, ['id' => 88]);
        $this->delete(self::TABLE, ['id' => 89]);
        $this->delete(self::TABLE, ['id' => 90]);
        $this->delete(self::TABLE, ['id' => 91]);
        $this->delete(self::TABLE, ['id' => 92]);
        $this->delete(self::TABLE, ['id' => 93]);
        $this->delete(self::TABLE, ['id' => 94]);
        $this->delete(self::TABLE, ['id' => 95]);
        $this->delete(self::TABLE, ['id' => 96]);
        $this->delete(self::TABLE, ['id' => 97]);
        $this->delete(self::TABLE, ['id' => 98]);
        $this->delete(self::TABLE, ['id' => 99]);
        $this->delete(self::TABLE, ['id' => 100]);
        $this->delete(self::TABLE, ['id' => 101]);
        $this->delete(self::TABLE, ['id' => 102]);
        $this->delete(self::TABLE, ['id' => 103]);
        $this->delete(self::TABLE, ['id' => 104]);
        $this->delete(self::TABLE, ['id' => 106]);
        $this->delete(self::TABLE, ['id' => 108]);
        $this->delete(self::TABLE, ['id' => 109]);
        $this->delete(self::TABLE, ['id' => 110]);
        $this->delete(self::TABLE, ['id' => 111]);
        $this->delete(self::TABLE, ['id' => 112]);
        $this->delete(self::TABLE, ['id' => 113]);
        $this->delete(self::TABLE, ['id' => 114]);
        $this->delete(self::TABLE, ['id' => 115]);
        $this->delete(self::TABLE, ['id' => 116]);
        $this->delete(self::TABLE, ['id' => 117]);
        $this->delete(self::TABLE, ['id' => 118]);
        $this->delete(self::TABLE, ['id' => 119]);
        $this->delete(self::TABLE, ['id' => 120]);
        $this->delete(self::TABLE, ['id' => 121]);
        $this->delete(self::TABLE, ['id' => 122]);
        $this->delete(self::TABLE, ['id' => 123]);
        $this->delete(self::TABLE, ['id' => 124]);
        $this->delete(self::TABLE, ['id' => 125]);
        $this->delete(self::TABLE, ['id' => 126]);
        $this->delete(self::TABLE, ['id' => 127]);
        $this->delete(self::TABLE, ['id' => 128]);
        $this->delete(self::TABLE, ['id' => 129]);
        $this->delete(self::TABLE, ['id' => 130]);
        $this->delete(self::TABLE, ['id' => 131]);
        $this->delete(self::TABLE, ['id' => 132]);
        $this->delete(self::TABLE, ['id' => 133]);
        $this->delete(self::TABLE, ['id' => 134]);
        $this->delete(self::TABLE, ['id' => 135]);
        $this->delete(self::TABLE, ['id' => 136]);
        $this->delete(self::TABLE, ['id' => 137]);
        $this->delete(self::TABLE, ['id' => 138]);
        $this->delete(self::TABLE, ['id' => 139]);
        $this->delete(self::TABLE, ['id' => 140]);
        $this->delete(self::TABLE, ['id' => 141]);
        $this->delete(self::TABLE, ['id' => 142]);
        $this->delete(self::TABLE, ['id' => 143]);
        $this->delete(self::TABLE, ['id' => 144]);
        $this->delete(self::TABLE, ['id' => 145]);
        $this->delete(self::TABLE, ['id' => 146]);
        $this->delete(self::TABLE, ['id' => 147]);
        $this->delete(self::TABLE, ['id' => 148]);
        $this->delete(self::TABLE, ['id' => 149]);
        $this->delete(self::TABLE, ['id' => 150]);
        $this->delete(self::TABLE, ['id' => 151]);
        $this->delete(self::TABLE, ['id' => 152]);
        $this->delete(self::TABLE, ['id' => 153]);
        $this->delete(self::TABLE, ['id' => 154]);
        $this->delete(self::TABLE, ['id' => 155]);
        $this->delete(self::TABLE, ['id' => 156]);
        $this->delete(self::TABLE, ['id' => 157]);
        $this->delete(self::TABLE, ['id' => 158]);
        $this->delete(self::TABLE, ['id' => 159]);
        $this->delete(self::TABLE, ['id' => 160]);
    }
*/
}