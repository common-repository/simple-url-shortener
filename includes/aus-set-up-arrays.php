<?php
/**
* Set Up Arrays
*
* Define various arrays
*
* @package	Artiss-URL-Shortener
* @since	1.7
*/

/**
* Build Services Array
*
* Function to build array of URL shortening services
*
* @since	1.0
*
* @return			string	Array of values
*/

function aus_build_services_array() {

	$service = array(   '101.GS' => '6http://101.gs/api.php?gs_key={key}&gs_link=',
						'1URL.com' => 'http://1url.com/?api=1url&u=',
						'2ty.cc' => 'http://2ty.cc/api.php?create=',
						'5v5' => 'http://www.5v5.net/index.php?api=1&return_url_text=1&longUrl=',
						'9mp' => 'http://9mp.com/api/shrink.php?username={username}&key={key}&version=1.0&mode=live&url=',
						'adf.ly' => 'http://api.adf.ly/api.php?key={key}&uid={uid}&advert_type=int&domain=adf.ly&url=',
						'adfly+banner' => 'http://api.adf.ly/api.php?key={key}&uid={uid}&advert_type=banner&domain=adf.ly&url=',
						'bit.ly+key' => 'http://api.bit.ly/v3/shorten?domain=bit.ly&login={login}&apiKey={key}&format=xml&longUrl=',
						'BlvMe' => 'http://api.blv.me/api?uid={uid}&apiid={key}&lock=1&mirror=blv.me&longurl=',
						'BudURL' => 'http://budurl.com/api/v1/budurls/shrink?api_key={key}&long_url=',
						'Cauzes' => 'http://cauzes.com/api/shorten/?theKitchenSink=login::{login}||apiKey::{key}||format::txt||longUrl::',
						'Celfra.me' => 'http://celfra.me/api.php?URL=',
						'chilp.it' => 'http://chilp.it/api.php?url=',
						'clck.ru' => 'http://clck.ru/--?url=',
						'clicky.me' => 'http://clicky.me/app/api?username={username}&password={password}&site_id={key}&url=',
						'CORT.AS' => 'http://cortas.elpais.com/encode.pl?r=json&u=',
						'CORT.AS+key' => 'http://cortas.elpais.com/encode.pl?r=json&key={key}&u=',
						'durl.me' => 'http://durl.me/api/Create.do?type=json&longurl=',
						'Eyk.me' => 'http://eyk.me/index.php?api=1&return_url_text=1&longUrl=',
						'fon.gs' => 'http://fon.gs/create.php?url=',
						'gkurl.us' => 'http://gkurl.us/shurly/api/shorten?format=txt&longUrl=',
						'i2h.de' => 'http://api.i2h.de/v1/?url=',
						'is.gd' => 'http://is.gd/api.php?longurl=',
						'ito.mx' => 'http://ito.mx/?module=ShortURL&file=Add&mode=API&url=',
						'j.mp' => 'http://api.bit.ly/v3/shorten?domain=j.mp&login={login}&apiKey={key}&format=xml&longUrl=',
						'Jdem.cz' => 'http://www.jdem.cz/get?url=',
						'Jive.to' => 'http://jive.to/api.php?url=',
						'korta.nu' => 'http://korta.nu/api/api.php?url=',
						'Linkasa' => 'http://api.linkasa.com/get.php?url=',
						'Linkbee' => 'Nhttp://linkbee.com/api.php?task=quicken&url=',
						'LinkBunch' => 'http://www.linkbun.ch/linkbunch.php?bunch=Bunch&mode=api&links=',
						'Linkee' => 'http://api.linkee.com/1.0/shorten?format=text&input=',
						'linkii.net' => 'http://linkii.net/api/write/get?type=xml&token={token}&url=',
						'LNK.co' => 'http://lnk.co/api.php?task=quicken&url=',
						'LNK.co+banner' => 'http://lnk.co/api.php?task=shorten&user={username}&pass={password}&ad=1&url=',
						'LNK.co+key' => 'http://lnk.co/api.php?task=shorten&user={username}&pass={password}&ad=2&url=',
						'ln-s.net' => 'http://ln-s.net/home/api.jsp?url=',
						'merky.de' => 'http://merky.de/api/?short=1&url=',
						'migre.me' => 'http://migre.me/api.txt?url=',
						'MinURL' => 'http://www.minu.me/api.php?url=',
						'mrte.ch' => 'http://api.mrte.ch/go.php?action=shorturl&format=xml&url=',
						'MtroShrink' => 'http://mtro.es/api.php?url=',
						'PARA.PT' => 'http://para.pt/api.aspx?cmd=CREATE&url=',
						'Pendek.in' => 'http://pendek.in/?url=',
						'plzLink.me' => 'http://plzlink.me/c-api.php?link=',
						'q.gs' => 'http://api.adf.ly/api.php?key={key}&uid={uid}&advert_type=int&domain=q.gs&url=',
						'q.gs+banner' => 'http://api.adf.ly/api.php?key={key}&uid={uid}&advert_type=banner&domain=q.gs&url=',
						'qlnk.net' => 'http://qlnk.net/api.php?url=',
						'qoiob' => 'http://qoiob.com/api/shorten/?theKitchenSink=login::{login}||apiKey::{key}||format::txt||longUrl::',
						'qr.cx' => 'http://qr.cx/api/?longurl=',
						'redir.ec' => 'http://redir.ec/_api/rest/redirec/create?url=',
						'ri.ms' => 'http://ri.ms/api-create.php?url=',
						'rnm.me' => 'http://rnm.me/api.php?apikey={key}&url=',
						's.coop' => 'http://s.coop/devapi.php?action=shorturl&format=simple&url=',
						'safe.mn' => 'http://safe.mn/api/?url=',
						'smsh.me' => 'http://smsh.me/?api=xml&url=',
						'stito.net' => 'http://www.stito.net/?module=ShortURL&file=Add&mode=api&url=',
						'su.pr' => 'http://su.pr/api?url=',
						'su.pr+key' => 'http://su.pr/api/shorten?login={login}&apiKey={key}&longUrl=',
						't1ny.us' => 'Nhttp://t1ny.us/',
						'tim.pe' => 'http://tim.pe/short?action=shorturl&format=simple&url=',
						'tinyarro.ws' => 'http://tinyarro.ws/api-create.php?url=',
						'tinyarrows.com' => 'http://tinyarro.ws/api-create.php?url=',
						'tinyurl' => 'http://tinyurl.com/api-create.php?url=',
						'tinyurl.ms' => 'http://tinyurl.ms/index.php?api=1&return_url_text=1&longUrl=',
						'TinyW.in' => 'http://tinyw.in/api.php?url=',
						'to.ly' => 'http://to.ly/api.php?longurl=',
						'to.vg' => 'http://to.vg/api.php?apiusr={username}&apikey={key}&urlquery=',
						'toGOto.us' => 'http://togoto.us/api.php?u=',
						'tra.kz' => 'http://tra.kz/api/shorten?api={key}&l=',
						'TURL' => 'http://turl.ca/api.php?url=',
						'tutz' => 'http://tutz.me/api.php?create=',
						'unloc.us' => 'http://api.blv.me/api?uid={uid}&apiid={key}&lock=1&mirror=unloc.us&longurl=',
						'url.co.uk' => 'http://url.co.uk/api/?key={key}&url=',
						'URLmini.net' => 'Nhttp://urlmini.net/api-create.php?format=TEXT&url=',
						'v.gd' => 'http://v.gd/create.php?format=simple&url=',
						'vl.am' => 'Nhttp://vl.am/api/shorten/plain/',
						'xav.cc' => 'http://api.xav.cc/simple/encode?url=',
						'xr.com' => 'http://api.xr.com/api?link=',
						'xrl.us' => 'http://metamark.net/api/rest/simple?long_url=',
						'yi.tl' => 'http://yi.tl/api.php?signature={token}&format=simple&action=shorturl&url=',
						'Zuly' => 'http://api.zu.ly/?a=add&u=',
						'zxc9.com' => 'http://zxc9.com/api.php?api={key}&url='
						);

	return $service;
}

/**
* Build XML Array
*
* Function to build array of XML tags for URL extraction
*
* @since	1.2
*
* @return			string	Array of values
*/

function build_xml_array() {

	$xml_convert = array(   '9mp' => 'short',
							'bit.ly+key' => 'url',
							'Celfra.me' => 'shortURL',
							'j.mp' => 'url',
							'linkii.net' => 'url',
							'mrte.ch' => 'shorturl',
							'smsh.me' => 'body'
						);

	return $xml_convert;
}

/**
* Build JSON Array
*
* Function to build array of JSON tags for URL extraction
*
* @since	1.2
*
* @return			string	Array of values
*/

function build_json_array() {

	$json_convert = array(  'BudURL' => 'budurl',
							'CORT.AS' => 'urlCortas',
							'CORT.AS+key' => 'urlCortas',
							'durl.me' => 'shortUrl',
							'Linkbee' => 'link',
							'LNK.co' => 'link',
							'LNK.co+banner' => 'link',
							'LNK.co+key' => 'link',
							'tra.kz' => 's',
							'vl.am' => 'hash'
						);

	return $json_convert;
}

/**
* Build URL Array
*
* Function to build array of URLs to be appended to the beginning of short codes
*
* @since	1.2
*
* @return			string	Array of values
*/

function build_url_array() {

	$url_addition=array(	'qlnk.net' => 'http://',
							'tra.kz' => 'http://tra.kz/',
							'TURL' => 'http://turl.ca/',
							'vl.am' => 'http://vl.am/'
						);

	return $url_addition;
}

/**
* Build trim Array
*
* Function to build array of services to have their output trimmed
*
* @since	2.0
*
* @return			string	Array of values
*/

function build_trim_array() {

	$output_trim=array(     'Celfra.me' => 14,
							'fon.gs' => 4,
							'ln-s.net' => 4,
							'safe.mn' => 1,
							'TURL' => 8,
							'url.co.uk' => 9
						);

	return $output_trim;
}
?>