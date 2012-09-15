


//Definition eines neuen Funktions-Selectors ":Contains"
//Benötigt für die Suchfunktion [filter()]
$.expr[':'].Contains = function(a, i, m) { 
	return $(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0; 
};

$(document).ready(function(){

//Filterzeile leeren
function empty_filter(){
	$('.ts_table_th').removeClass('inactive');
	$('#f_txt').val('');
	$('#f_tnr').val('');
	$('.f_select_prod').val('');
	$('.f_select_status').val('');
}

//Filterfunktion
function filter() {
	var rows = $('.ts_table_th');
	
	    rows.addClass('inactive');
	    //Produkt-Suche
	    if($('.f_select_prod').val()!=''){
		   rows = $.grep(rows, function(elem) {
			   return ( $(elem).data('prod') == $('.f_select_prod').val() ); 
		   });
	    }
	    //Status-Suche
	    if($('.f_select_status').val()!=''){
	    	rows = $.grep(rows, function(elem) {
	    		return ( $(elem).data('status') == $('.f_select_status').val() ); 
	    	});
	    }
	    //Ticketnummer-Suche
	    if($('#f_tnr').val()!=''){
	    	rows = $.grep(rows, function(elem) {
	    		return ( $(elem).data('id') == $('#f_tnr').val() ); 
	    	});
	    }
	    //Betrefftext-Suche
	    if($('#f_txt').val()!=''){
		    rows = $.grep(rows, function(elem) {
		    	return ( $(elem).filter(':Contains("' + $('#f_txt').val() + '")').length > 0 ); 
		    });
	    }
	    $(rows).removeClass('inactive');
}

/**
 * sort table rows
 * @param str type, either "date" / "status" / "betreff"
 */
function sortRows (type) {
	var dat_this = $(this),
        tx = dat_this.data('tx'),
        rows = $('.' + tx + '_table_th').remove();
			   
   //Absteigend Sortieren
   if(dat_this.data('sort')=='Asc'){
       dat_this.data('sort','Desc');
       switch (type)
       {
          case 'datum':
              rows.sort(function(a,b){
                  return (parseInt($(a).data('timestamp'),10) > parseInt($(b).data('timestamp'),10)) ? 1 : ( (parseInt($(a).data('timestamp'),10) == parseInt($(b).data('timestamp'),10)) ? 0 : -1);
              }).each(function(){$(this).appendTo($('.' + tx + '_scrollarea > div'));});
              $('.dat_sort_pfeil, .stat_sort_pfeil, .betr_sort_pfeil, .tv_datum_sort_pfeil, .tv_status_sort_pfeil, .tv_betreff_sort_pfeil, .tv_empfaenger_sort_pfeil').hide();
              if(tx === 'ts'){$('.dat_sort_pfeil').show().html('&#9653;');}
              if(tx === 'tv'){$('.tv_datum_sort_pfeil').show().html('&#9653;');}
              break;
          case 'status':
              rows.sort(function(a,b){
                  return ( $(a).data('status') > $(b).data('status') ) ? 1 : ( $(a).data('status') == $(b).data('status') ) ? 0 : -1;
              }).each(function(){$(this).appendTo($('.' + tx + '_scrollarea > div'));});
              $('.dat_sort_pfeil, .stat_sort_pfeil, .betr_sort_pfeil, .tv_datum_sort_pfeil, .tv_status_sort_pfeil, .tv_betreff_sort_pfeil, .tv_empfaenger_sort_pfeil').hide();
              if(tx === 'ts'){$('.stat_sort_pfeil').show().html('&#9653;');}
              if(tx === 'tv'){$('.tv_status_sort_pfeil').show().html('&#9653;');}
              break;
          case 'empfaenger':
        	  rows.sort(function(a,b){
        		  return ( $(a).data('empfaenger') > $(b).data('empfaenger') ) ? 1 : ( $(a).data('empfaenger') == $(b).data('empfaenger') ) ? 0 : -1;
        	  }).each(function(){$(this).appendTo($('.' + tx + '_scrollarea > div'));});
        	  $('.dat_sort_pfeil, .stat_sort_pfeil, .betr_sort_pfeil, .tv_datum_sort_pfeil, .tv_status_sort_pfeil, .tv_betreff_sort_pfeil, .tv_empfaenger_sort_pfeil').hide();
        	  $('.tv_empfaenger_sort_pfeil').show().html('&#9653;');
              break;
          case 'betreff':
              //break omitted
          default:
              rows.sort(function(a,b){
                  return (parseInt( $(a).text(), 10 ) > parseInt( $(b).text(), 10 ) ) ? 1 : ( parseInt( $(a).text(), 10 ) == parseInt( $(b).text(), 10 ) ) ? 0 : -1;
              }).each(function(){$(this).appendTo($('.' + tx + '_scrollarea > div'));});
          	  $('.dat_sort_pfeil, .stat_sort_pfeil, .betr_sort_pfeil, .tv_datum_sort_pfeil, .tv_status_sort_pfeil, .tv_betreff_sort_pfeil, .tv_empfaenger_sort_pfeil').hide();
	          if(tx === 'ts'){$('.betr_sort_pfeil').show().html('&#9653;');}
	          if(tx === 'tv'){$('.tv_betreff_sort_pfeil').show().html('&#9653;');}
              break;
       }
//       $('.sort_pfeil').html('&#x2191;');
   //Aufsteigend Sortieren
   }else{
       dat_this.data('sort','Asc');
       switch (type)
       {
          case 'datum':
              rows.sort(function(a,b){
                  return (parseInt($(a).data('timestamp'),10) < parseInt($(b).data('timestamp'),10)) ? 1 : ( (parseInt($(a).data('timestamp'),10) == parseInt($(b).data('timestamp'),10)) ? 0 : -1);
              }).each(function(){$(this).appendTo($('.' + tx + '_scrollarea > div'));});
              $('.dat_sort_pfeil, .stat_sort_pfeil, .betr_sort_pfeil, .tv_datum_sort_pfeil, .tv_status_sort_pfeil, .tv_betreff_sort_pfeil, .tv_empfaenger_sort_pfeil').hide();
              if(tx === 'ts'){$('.dat_sort_pfeil').show().html('&#9663;');}
              if(tx === 'tv'){$('.tv_datum_sort_pfeil').show().html('&#9663;');}
              break;
          case 'status':
              rows.sort(function(a,b){
                  return ( $(a).data('status') < $(b).data('status') ) ? 1 : ( $(a).data('status') == $(b).data('status') ) ? 0 : -1;
              }).each(function(){$(this).appendTo($('.' + tx + '_scrollarea > div'));});
              $('.dat_sort_pfeil, .stat_sort_pfeil, .betr_sort_pfeil, .tv_datum_sort_pfeil, .tv_status_sort_pfeil, .tv_betreff_sort_pfeil, .tv_empfaenger_sort_pfeil').hide();
              if(tx === 'ts'){$('.stat_sort_pfeil').show().html('&#9663;');}
              if(tx === 'tv'){$('.tv_status_sort_pfeil').show().html('&#9663;');}
              break;
          case 'empfaenger':
        	  rows.sort(function(a,b){
        		  return ( $(a).data('empfaenger') < $(b).data('empfaenger') ) ? 1 : ( $(a).data('empfaenger') == $(b).data('empfaenger') ) ? 0 : -1;
        	  }).each(function(){$(this).appendTo($('.' + tx + '_scrollarea > div'));});
        	  $('.dat_sort_pfeil, .stat_sort_pfeil, .betr_sort_pfeil, .tv_datum_sort_pfeil, .tv_status_sort_pfeil, .tv_betreff_sort_pfeil, .tv_empfaenger_sort_pfeil').hide();
        	  $('.tv_empfaenger_sort_pfeil').show().html('&#9663;');
        	  break;
          case 'betreff':
              //break omitted
          default:
              rows.sort(function(a,b){
            	  return (parseInt( $(a).text(), 10 ) < parseInt( $(b).text(), 10 ) ) ? 1 : ( parseInt( $(a).text(), 10 ) == parseInt( $(b).text(), 10 ) ) ? 0 : -1;
              }).each(function(){$(this).appendTo($('.' + tx + '_scrollarea > div'));});
          $('.dat_sort_pfeil, .stat_sort_pfeil, .betr_sort_pfeil, .tv_datum_sort_pfeil, .tv_status_sort_pfeil, .tv_betreff_sort_pfeil, .tv_empfaenger_sort_pfeil').hide();
          	  if(tx === 'ts'){$('.betr_sort_pfeil').show().html('&#9663;');}
	          if(tx === 'tv'){$('.tv_betreff_sort_pfeil').show().html('&#9663;');}
              break;
       }
//       $('.sort_pfeil').html('&#x2193;');
   }
}






////Sortierfunktion - Betreff
//function sortBetrAsc () {
//	var rows = $('.ts_table_th').remove(),
//		betr_this = $(this);
////	console.log('hi');
//	//Absteigend Sortieren
//	if(betr_this.data('sort')=='Asc'){
//		betr_this.data('sort','Desc');
//		rows.sort(function(a,b){
//			return (parseInt($(a).data('timestamp'),10) > parseInt($(b).data('timestamp'),10)) ? 1 : ( (parseInt($(a).data('timestamp'),10) == parseInt($(b).data('timestamp'),10)) ? 0 : -1);
//		}).each(function(){$(this).appendTo($('.ts_scrollarea > div'))});
//		$('.sort_pfeil').html('&#x2191;');
//	//Aufsteigend Sortieren
//	}else{
//		betr_this.data('sort','Asc');
//		rows.sort(function(a,b){
//			return (parseInt($(a).data('timestamp'),10) < parseInt($(b).data('timestamp'),10)) ? 1 : ( (parseInt($(a).data('timestamp'),10) == parseInt($(b).data('timestamp'),10)) ? 0 : -1);
//		}).each(function(){$(this).appendTo($('.ts_scrollarea > div'))});
//		$('.sort_pfeil').html('&#x2193;');
//	}
//}
//
////Sortierfunktion - Datum
//function sortDatAsc () {
//	var rows = $('.ts_table_th').remove(),
//		dat_this = $(this);
////	console.log('hi');
//	//Absteigend Sortieren
//	if(dat_this.data('sort')=='Asc'){
//		dat_this.data('sort','Desc');
//		rows.sort(function(a,b){
//			return (parseInt($(a).data('timestamp'),10) > parseInt($(b).data('timestamp'),10)) ? 1 : ( (parseInt($(a).data('timestamp'),10) == parseInt($(b).data('timestamp'),10)) ? 0 : -1);
//		}).each(function(){$(this).appendTo($('.ts_scrollarea > div'))});
//		$('.sort_pfeil').html('&#x2191;');
//	//Aufsteigend Sortieren
//	}else{
//		dat_this.data('sort','Asc');
//		rows.sort(function(a,b){
//			return (parseInt($(a).data('timestamp'),10) < parseInt($(b).data('timestamp'),10)) ? 1 : ( (parseInt($(a).data('timestamp'),10) == parseInt($(b).data('timestamp'),10)) ? 0 : -1);
//		}).each(function(){$(this).appendTo($('.ts_scrollarea > div'))});
//		$('.sort_pfeil').html('&#x2193;');
//	}
//}
//
////Sortierfunktion - Status
//function sortStatAsc () {
//	var rows = $('.ts_table_th').remove(),
//		dat_this = $(this);
////	console.log('hi');
//	//Absteigend Sortieren
//	if(dat_this.data('sort')=='Asc'){
//		dat_this.data('sort','Desc');
//		rows.sort(function(a,b){
//			return (parseInt($(a).data('timestamp'),10) > parseInt($(b).data('timestamp'),10)) ? 1 : ( (parseInt($(a).data('timestamp'),10) == parseInt($(b).data('timestamp'),10)) ? 0 : -1);
//		}).each(function(){$(this).appendTo($('.ts_scrollarea > div'))});
//		$('.sort_pfeil').html('&#x2191;');
//	//Aufsteigend Sortieren
//	}else{
//		dat_this.data('sort','Asc');
//		rows.sort(function(a,b){
//			return (parseInt($(a).data('timestamp'),10) < parseInt($(b).data('timestamp'),10)) ? 1 : ( (parseInt($(a).data('timestamp'),10) == parseInt($(b).data('timestamp'),10)) ? 0 : -1);
//		}).each(function(){$(this).appendTo($('.ts_scrollarea > div'))});
//		$('.sort_pfeil').html('&#x2193;');
//	}
//}

/*
*	Ticketdaten abrufen
*	DATENHERKUNFT:	.ts_table_th
*	- Loading-Gif zur Überbrückung der Ladezeit
*	- .ts_table_th active wird entfernt [.removeClass('active')]
*	- THIS bekommt die Klasse "active" [.addClass('active')]
*	- Ajax-Request => an function.php
*				   => DB-Abfrage
*				   => Rückgabe-Wert an ts_details
*/

//function ts_get_details(){
//	var id = $(this).data('id');
//        $('.ts_details_text_inhalt').html("<img align='center' src='http://www.roundel.de/support_center/gif/ajax-loader.gif'>");
//       //$('.ts_details_text').text("Loading...");
//        $('.content2 .inhalt .ts_inhalt .ts_uebersicht .ts_scrollarea .ts_table_th').removeClass('active');
//        $(this).addClass('active');
//
//    	$.ajax({
//			url: '<?= echo $this->baseUrl() . "/request/ts-details/"',
//			type: "post",
//			data:  "id=" + id +
//                   "&action=get_details",
//			dataType: "json", 
//			success: ts_details
//	});
//};

/*
*	Ticketdaten zuordnen und auf GUI platzieren
*	DATENHERKUNFT: ts_get_details
*	
*	Es wird neue <div> erzeugt in <div class="tv_scrollarea"> 
*	neue <div> bekommen css-klassen zugeordnet	
*	und zur Anzeige in "tv_table_th" gebracht
*/

function ts_details(res){
	if(res[0]){
		
//====>>>> !! WIEDER ENTFERNEN SOBALD DB-STRUKTUR ANGEPASST !! <<<<====\\
	res[0].tv_screenshot = res[0].tv_screenshot != '' ? [res[0].tv_screenshot] : [];
	res[0].tv_screenshot.push("test");
//====>>>> !! WIEDER ENTFERNEN SOBALD DB-STRUKTUR ANGEPASST !! <<<<====\\

	ticket_inhalt(res[0]);
	var container = $('.tv_scrollarea > div').empty();
//	console.log(res);	
	
	$.each(res, function(a,b){
		var tv_table_th = $('<div>',{
									"class": "tv_table_th",
									"data-id": b.id_ticket_verlauf,
									"data-timestamp": b.timestamp
									})
								.data("fehlermeldung", b.tv_fehlermeldung)
								.data("fehlerart", b.fehlerart)
								.data("produkt", b.produkt)
								.data("debitor", b.debitor)
								.data("ticket_id", b.ticket_id)
								.data("fehlertext", b.tv_fehlertext)
								.data("tv_screenshot", b.tv_screenshot)
								.data("id_ticket_verlauf", b.id_ticket_verlauf);
		 
		$('<div>',{
			text: b.tv_fehlermeldung,
			"class": "tv_betreff"}).appendTo(tv_table_th);
		$('<div>',{
			text: b.tv_datum,
			"class": "tv_datum"}).appendTo(tv_table_th);
		$('<div>',{
			text: b.tv_empfaenger,
			"class": "tv_empfaenger"}).appendTo(tv_table_th);
		$('<div>',{
			text: b.tv_status,
			"class": "tv_status " + b.tv_status }).appendTo(tv_table_th);
		$('<div>',{
			text: b.tv_screenshot != '' ? 'A' : '',
			"class": "tv_screenshot"}).appendTo(tv_table_th);
			tv_table_th.appendTo(container);
			
	});
	
	$('.content2 .inhalt .ts_details_inhalt .ts_details_verlauf .tv_scrollarea .tv_table_th').first().trigger('click');
	}
	
};

/*
*	Ticket Inhalt
*	DATENHERKUNFT:	tv_get_details
*	wird per (data) übergeben
*	.ts_details_text_inhalt wird geleert um danach wieder beschrieben zu werden
*	Ticketinhalt wird an Browser-Titel übergeben
*	
*/

function ticket_inhalt (data) {
	var anhang;
	$('.ts_details_text_inhalt').empty();
	$('.ts_details_text_inhalt').append(
			$('<p>',{
				html: data.fehlertext.replace(/\n/g, '<br />')}));
	
	$(document).attr("title", data.ticket_id + " // " + data.debitor + " // " + data.produkt + " // " + data.fehlerart + " // " + data.tv_fehlermeldung);
	$('.ts_details_text_betreff_inhalt').text(data.fehlerart + " // " + data.tv_fehlermeldung);
	$('.ts_details_text_th_ticketid').text("Ticket ID: " + data.ticket_id);
	var anhang_container = $('.ts_details_text_auswahl_anhang > div').empty();
	
	$.each(data.tv_screenshot, function(a,b){
		anhang = $('<div>',{
							"class": "tv_anhang"
						    })
						    .data("tv_screenshot", b);
		$('<div>',{
			text: b,
			"class": "tv_screenshot"}).appendTo(anhang);
			anhang.appendTo(anhang_container);
	});
}

/*
*	Ticket-Details abrufen
*	DATENHERKUNFT:	.tv_table_th
*	Datenzuordnung an variable $this
*	INHALT wird auf data geschrieben
*	$this.data('INHALT') aufruf der inhalte
*
*	Datenweitergabe an ticket_inhalt(data)
*
*	Datenweitergabe an Button
*	- input[name=tv_neu]
*	- input[name=druck]
*/

function tv_get_details(e){
	var $this = $(this),
		data = {
		"tv_fehlermeldung" :$this.data('fehlermeldung'), 
		"fehlertext" :$this.data('fehlertext'), 
		"fehlerart" :$this.data('fehlerart'), 
		"produkt" :$this.data('produkt'), 
		"debitor" :$this.data('debitor'), 
		"ticket_id" :$this.data('ticket_id'),
		"id_ticket_verlauf" :$this.data('id_ticket_verlauf'),
		"tv_screenshot" :$this.data('tv_screenshot')
		
	};

	$('.content2 .inhalt .ts_details_inhalt .ts_details_verlauf .tv_scrollarea .tv_table_th').removeClass('active');
	$this.addClass('active');
	
	ticket_inhalt(data);
	 $('input[name=tv_neu]').data('ticket_id',$this.data('ticket_id'));
	 $('input[name=tv_neu]').data('tv_fehlermeldung',$this.data('fehlermeldung'));
	 
	 $('input[name=druck]').data('ticket_id',$this.data('ticket_id'));
	 $('input[name=druck]').data('tv_fehlermeldung',$this.data('fehlermeldung'));
	 $('input[name=druck]').data('fehlertext',$this.data('fehlertext'));
	 $('input[name=druck]').data('fehlerart',$this.data('fehlerart'));
	 $('input[name=druck]').data('produkt',$this.data('produkt'));
	 $('input[name=druck]').data('debitor',$this.data('debitor'));
	 $('input[name=druck]').data('id_ticket_verlauf',$this.data('id_ticket_verlauf'));
	 
	 $('.tv_anhang').data('ticket_id',$this.data('ticket_id'));

	 if ($('.content2 .inhalt .ts_details_inhalt .ts_details_verlauf .tv_scrollarea .tv_table_th').first().hasClass('active')){
			$('.ts_details_titel_button').fadeIn('fast');
	 }
	 e.preventDefault();
	 e.stopPropagation();
}

/*
*	POST-Übergabe an function.php
*	function.php => DB Abfrage => Liefert DB Daten zurück
*	Datenübergabe an funktion ts_liste()
*/

//function ts_get_liste(){
//	$.ajax({
//		url: '<?php echo $this->baseUrl() . "/request/ts-details/"?>',
//		type: "post",
//		data: "action=get_liste",
//		dataType: "json",
//		success: ts_liste
//	});
//};

/*
*	Ticketdaten zuordnen und auf GUI platzieren
*	DATENHERKUNFT: ts_get_liste
*	
*	Es wird neue <div> erzeugt in <div class="ts_scrollarea"> 
*	neue <div> bekommen css-klassen zugeordnet	
*	und zur Anzeige in "ts_table_th" gebracht
*/

function ts_liste(res){
	var container = $('.ts_scrollarea > div').empty();
//	console.log(res);
	$.each(res, function(a,b){
		status = (b.status == 'b')  ? 'in bearbeitung'
				:((b.status == 'a') ? 'abgeschlossen'
								    : 'unbearbeitet'
				 );
		var ts_table_th = $('<div>',{
					                "class": "ts_table_th",
					                "data-id": b.ticket_id,
					                "data-status": status,
					                "data-prod": b.produkt,
					                "data-timestamp": b.timestamp
				                	});
		$('<div>',{
			text: b.ticket_id + " // " + b.produkt + " // " + b.fehlerart + " // " + b.fehlermeldung,
			"class": "betreff"}).appendTo(ts_table_th);
		$('<div>',{
			text: b.dat_format,
			"class": "datum"}).appendTo(ts_table_th);
		$('<div>',{
			text: status,
			"class": "status"}).appendTo(ts_table_th);
			ts_table_th.appendTo(container);
	});
};

/*
*	Ticket-Verlauf-Funktion
*	DATENHERKUNFT: tv_get_details
*	Weitergabe an: tv_neu.php
*	
*/

function tv_neu_anzeige(){
	var ticket_id = $(this).data('ticket_id');
	var tv_fehlermeldung = $(this).data('tv_fehlermeldung');
	active_ts_liste = $('.content2 .inhalt .ts_inhalt .ts_uebersicht .ts_scrollarea .ts_table_th');
	active_tv_liste = $('.content2 .inhalt .ts_details_inhalt .ts_details_verlauf .tv_scrollarea .tv_table_th');
	
	//console.log($(this));
	if(active_ts_liste.hasClass('active') && active_tv_liste.hasClass('active')){
		$('.lock').fadeTo('fast',0.6).css({zIndex: '1000'});
        $('.new_site').fadeIn('slow').css({zIndex: '1002'});
		$('.rahmen').load('tv_neu.php',{ticket_id:ticket_id, tv_fehlermeldung:tv_fehlermeldung});
	}
};

/*
*	Druck-Funktion
*	DATENHERKUNFT: tv_get_details
*	Weitergabe an: druck.php
*	
*/

function druck(){
	var ticket_id = $(this).data('ticket_id');
//	var fehlermeldung = $(this).data('tv_fehlermeldung');
//	var fehlertext = $(this).data('fehlertext');
//	var fehlerart = $(this).data('fehlerart');
//	var produkt = $(this).data('produkt');
//	var debitor = $(this).data('debitor');
	var id_ticket_verlauf = $(this).data('id_ticket_verlauf');

	$('.lock').fadeTo('fast',0.6).css({zIndex: '1000'});	
	$('.new_site').fadeIn('slow').css({zIndex: '1002'});
	$('.rahmen').html('<iframe class="pdf" style="display:block" src="druck.php?id='+ticket_id+'&tvid='+id_ticket_verlauf+
			'" width="800px" height="500px" scrollbar="no" marginwidth="0" marginheight="0" hspace="0" align="middle"'+
			'" frameborder="1" scrolling="no" style="width:100%; border:0;  height:500px; overflow:auto;"></iframe>');
}

//Funktion zum "schließen" eines Div-tags wie zB. für die Antworten- und/oder Druckenfunktion
function close(e){
	$('.lock').fadeOut('fast').css({zIndex: '-1', display: 'none'});
	$('.new_site').fadeOut('fast').css({zIndex: '-2', display: 'none'});
	$('.inhalt').fadeTo('fast',1.00);
	e.preventDefault();
}

//Funktion zum Öffnen eines Anhangs
function anhang(){
	$('.lock').fadeTo('fast',0.6).css({zIndex: '1000'});	
	$('.new_site').fadeIn('slow').css({zIndex: '1002'});
	$('.rahmen').load('anhang.php',{ticket_id:ticket_id});
}

/*
*	Click-Handler
*	$("[OBJEKT]").on('[AKTION]','[DATENHERKUNFT]',[FUNKTIONSAUFRUF]);
*	[OBJEKT]
*		- css-klasse [.klasse]
*		- css-id	 [#id]
*		- TAG-ansprechen bspw. input[name=name] => <input name="name">
*	[AKTION]
*		- click => klick mit linker Maustaste
*	[DATENHERKUNFT]
*		- angabe einer CSS-Box zb: .ts_table_th
*	[FUNKTIONSAUFRUF]
*		- jQuery Funktion aufrufen zb: ts_get_details
*/

$(".ts_scrollarea").click('.ts_table_th',ts_get_details);	//Klick auf Div [ts_scrollarea] => hole Daten aus ts_table_th und rufe Funktion [ts_get_details] auf
ts_get_liste();													//Funktionsaufruf [ts_get_liste]
$(".aktualisieren").click(ts_get_liste);					//Klick auf Div [aktualisieren] => rufe Funktion ts_get_liste auf
$(".tv_scrollarea").click('.tv_table_th',tv_get_details);	//Klick auf Div [tv_scrollarea] => hole Daten aus tv_table_th und rufe Funktion [tv_get_details] auf
$("input[name=tv_neu]").click(tv_neu_anzeige);				//Klick auf Input-Button mit Name [tv_neu] => rufe Funktion tv_neu_anzeige auf
$("input[name=druck]").click(druck);						//[DRUCKEN] Klick auf Input-Button mit Name [druck] => rufe Funktion druck auf
$("input[name=close]").click(close);						//[SCHLIESSEN] Klick auf Input-Button mit Name [close] => rufe Funktion close auf
$(".sc_content").click('input[name=abbrechen]',close);		//[SCHLIESSEN] Klick auf Input-Button mit Name [abbrechen] innerhalb der Div [sc_content] => rufe Funktion close auf
$('.betr_txt, .tv_betreff_txt').click(function(){sortRows.call($(this),'betreff');});	//[BETREFF SORTIEREN] Klick auf Div [betr_txt] => rufe Funktion sortBetrAsc auf
$('.dat_txt, .tv_datum_txt').click(function(){sortRows.call($(this),'datum');});		//[DATUM SORTIEREN] Klick auf Div [dat_txt] => rufe Funktion sortDatAsc auf
$('.stat_txt, .tv_status_txt').click(function(){sortRows.call($(this),'status');});	//[STATUS SORTIEREN] Klick auf Div [stat_txt] => rufe Funktion sortStatAsc auf
$('.tv_empfaenger_txt').click(function(){sortRows.call($(this),'empfaenger');});	//[STATUS SORTIEREN] Klick auf Div [stat_txt] => rufe Funktion sortStatAsc auf
$('input[name=filter_del]').click(empty_filter);			//[FILTERZEILE LEEREN] Klick auf Input-Button mit Name [filter_del] => rufe Funktion empty_filter auf
$('.f_select_status, .f_select_prod').change(filter);		//[FILTERZEILE][Auswahlboxen] Wenn Änderung in Auswahlbox => rufe Funktion filter auf
$('#f_txt, #f_tnr').keyup(filter);						//[FILTERZEILE][Eingabeboxen] Bei Eingabe in Eingabebox => rufe Funktion filter auf 
$('.tv_anhang').click(anhang);
});