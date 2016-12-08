var fJS;
var markercluster;
var clusterstyles = [
		{
		  url: '../Content/img/marker_cluster.png',
		  backgroundPosition:  "3px 0",
			height: 37,
			width: 46,
			anchor: [0, -1],
			textColor: '#EB7A12',
			textSize: 17
		}
]
var clusteroptions = {
	'gridSize': 30,
	'minimumClusterSize': 2,
	'styles': clusterstyles

}
$(function () {

	fJS = filterInit();

	pagination = new $.smFilteredPagination($("#projects"), {
		pagerItems: "li.item",
		itemsPerPage: 15
	});

	getTotal();

	//maak alle filters leeg
	//console.log($('#gebouwcategorie, #gebruiksfunctie, #gprversie').closest('section').find(':checkbox'));
	$('#rDiety, #rHistory, #rtheme, #rAncestral').closest('section').find(':checkbox').attr('checked', true);
	//    $('#themafilters').closest('section').find(':checkbox').attr('checked', false);
	$('#search_box').val('');

	//maak zoekveld leeg bij klik
	$('.clearsearch').click(function () {
		$('#search_box').val('');
		fJS.filter();
	})

	/* THEMA SLIDER CONTROLS */
	var number = 1 + Math.floor(Math.random() * 5);
	$(".slide:not(:nth-child(" + number + "))").css("top", 250);
	$(".slide:nth-child(" + number + ")").addClass("active");
	$("#controls li:nth-child(" + number + ")").addClass("active");
	$("#themas li").live("click", function () {
		if (!$(this).hasClass("active")) {
			var id = $(this).attr("id");
			$("#slider .active").animate({ top: "250" }, function () {
				$("." + id).animate({ top: "10" });
				$("." + id).addClass("active").siblings().removeClass("active");
			});

			$(this).addClass("active").siblings().removeClass("active");
		}
	});

	$(".nextSlide").live("click", function () {
		$("#slider .active:not(:last-child)").animate({ top: "250" }, function () {
			$("#slider .active").next().animate({ top: "10" }).addClass("active").siblings().removeClass("active");
			$("#themas .active").next().addClass("active").siblings().removeClass("active");
		});
	});
	$(".prevSlide").live("click", function () {
		$("#slider .active:not(:first-child)").animate({ top: "250" }, function () {
			$("#slider .active").prev().animate({ top: "10" }).addClass("active").siblings().removeClass("active");
			$("#themas .active").prev().addClass("active").siblings().removeClass("active");
		});
	});

	/* OPEN/CLOSE FILTERS */
	$(".openclose").live("click", function () {
		if ($(this).hasClass("open")) {
			$(this).parent().find("section").slideToggle("fast");
			$(this).find("a").text("{");
			$(this).removeClass("open");
		} else {
			$(this).parent().find("section").slideToggle("fast");
			$(this).find("a").text("}");
			$(this).addClass("open");
		}
	});

	/* LIJST/KAART TOGGLE */
	$(".views a").live("click", function () {
		if (!$(this).hasClass("active")) {
			$(".views a").toggleClass("active");
			$("#overview section").toggle();
		}
	});

	//    $(".slidertoggle").click(function () {
	//        var sliderid = "#" + $(this).closest('input').val();
	//        if ($(this).is(":checked")) {
	//            $(sliderid + "_filter").val("1-10");
	//        } else {
	//            var min = $(sliderid).slider("values", 0),
	//                max = $(sliderid).slider("values", 1);
	//            $(sliderid + "_filter").val(min + "-" + max);
	//        }
	//        fJS.filter();
	//    });

	var options = {
		range: true,
		min: 1,
		max: 10,
		values: [1, 10],
		step: 0.1,
		slide: function (event, ui) {
			var SlideId = event.target.id + "_filter";
			if ($(this).parent().find(':checkbox').is(":checked")) {
				$(SlideId).val("1-10");
			} else {
				$("#" + SlideId).val(ui.values[0] + '-' + ui.values[1]);
				$("#" + SlideId).trigger('change');
				fJS.filter();
			}
		}
	};

	$('#energie_filter').val('1-10');
	$('#milieu_filter').val('1-10');
	$('#gezondheid_filter').val('1-10');
	$('#gebruikskwaliteit_filter').val('1-10');
	$('#toekomstwaarde_filter').val('1-10');
	$('#score_filter').val('0-50');

	$("#energie").slider(options);
	$("#milieu").slider(options);
	$("#gezondheid").slider(options);
	$("#gebruikskwaliteit").slider(options);
	$("#toekomstwaarde").slider(options);
	$("#score").slider({
		range: true,
		min: 0,
		max: 50,
		values: [0, 50],
		step: 5,
		slide: function (event, ui) {
			if (ui.values[0] >= ui.values[1]) { return false; }
			var SlideId = event.target.id + "_filter";
			//console.log(SlideId);
			//console.log(ui.values[0] + '-' + ui.values[1]);
			$("#" + SlideId).val(ui.values[0] + '-' + ui.values[1]);
			$("#" + SlideId).trigger('change');
			get_average_score()
			fJS.filter();
		}
	});

	/* Gemiddelde score */
	var empty = '<span class="empty"></span>';
	var left = '<span class="left"></span>';
	var right = '<span class="right"></span>';
	var full = '<span class="full"></span>';
	var grey = '<span class="grey"></span>';

	get_average_score();

	function get_average_score() {
		var score = $("#score_filter").val();
		var expl_score = score.split("-");
		var stars = "";
		var first = true;
		var last = false;
		for (var i = 10; i <= 50; i += 10) {
			if (!last) {
				if (first) {
					if (expl_score[0] > i) {
						stars += grey;
					} else if (expl_score[0] == i) {
						stars += grey;
						first = false;
					} else if (expl_score[0] == 0 && expl_score[1] != 5) {
						stars += full;
						first = false;
					} else if (expl_score[1] == 5) {
						stars += right;
						last = true;
					} else {
						stars += left;
						first = false;
					}
				} else {
					if (expl_score[1] > i) {
						stars += full;
					} else if (expl_score[1] == i) {
						stars += full;
						first = false;
					} else if (expl_score[1] == i - 5) {
						stars += right;
						first = false;
					} else {
						stars += empty;
						first = false;
						last = true;
					}
				}
			} else {
				stars += empty;
			}
		}
		$("#average").html(stars);
	}
	
	//http://a32.me/2012/05/handling-huge-amount-of-markers-on-google-maps-with-clusters/
	markercluster = new MarkerClusterer(googleMap.map, googleMap.markersarray, clusteroptions);

	//filter in url
	if (location.search.substring(1)) {
		//backwords compatible
		//var URLfilters = JSON.parse('{"' + decodeURI(location.search.substring(1).replace(/&/g, "\",\"").replace(/=/g, "\":\"")) + '"}');
		window.location.assign('/#' + location.search.substring(1));
	} if (location.hash.substring(1)) {
		if (location.hash.substring(1) == "-") {
			return false;
		}
		var URLfilters = JSON.parse('{"' + decodeURI(location.hash.substring(1).replace(/&/g, "\",\"").replace(/=/g, "\":\"")) + '"}');
	}
	if(URLfilters){
		var themas = ['energie', 'milieu', 'gezondheid', 'gebruikskwaliteit', 'toekomstwaarde'];

		if (URLfilters != null) {
			if (URLfilters["zoek"]) {
				$('#search_box').val(URLfilters["zoek"]);
			}
			$.each(themas, function (index, key) {
				if (URLfilters[key]) {
					$('#' + key + '_filter').val(URLfilters[key]);
					var waarde = URLfilters[key].split('-');
					//koppel 0-100% aan 1-10
					var min = (waarde[0] - 1) * (100 / 9);
					var max = (waarde[1] - 1) * (100 / 9);
					var range = max - min;
					$('#' + key + ' .ui-slider-range').css('left', min + '%');
					$('#' + key + ' .ui-slider-range').css('width', range + '%');
					$('#' + key + ' .ui-slider-handle:first').css('left', min + '%');
					$('#' + key + ' .ui-slider-handle:last').css('left', max + '%');
				}
			});
			if (URLfilters["gemiddelde"]) {
				$('#score_filter').val(URLfilters["gemiddelde"]);
				var waarde = URLfilters["gemiddelde"].split('-');
				//koppel 0-100% aan 0-50
				var min = waarde[0] * 2;
				var max = waarde[1] * 2;
				var range = max - min;
				$('#score .ui-slider-range').css('left', min + '%');
				$('#score .ui-slider-range').css('width', range + '%');
				$('#score .ui-slider-handle:first').css('left', min + '%');
				$('#score .ui-slider-handle:last').css('left', max + '%');
			}
			if (URLfilters["categorie"]) {
				$('#gebouwcategorie').find('input[type =checkbox]').prop('checked', false);
				$('#' + URLfilters["categorie"]).prop('checked', true);
			}
			if (URLfilters["functie"]) {
				var functiearray = URLfilters["functie"].split(',');
				$('#gebruiksfunctie').find('input[type =checkbox]').prop('checked', false);
				$.each(functiearray, function (index, key) {
					$('#' + key).prop('checked', true);
				});
			}
			if (URLfilters["versie"]) {
				var functiearray = URLfilters["versie"].split(',');
				$('#gprversie').find('input[type =checkbox]').prop('checked', false);
				$.each(functiearray, function (index, key) {
					$('#' + key).prop('checked', true);
				});
			}

			fJS.filter();
		}
	}
	$("#shareinput").focus(function () {
		// Select input field contents
		this.select();
	});
	$("#shareinput").click(function () {
		// Select input field contents
		this.select();
	});
	
});

function getFilters() {
	var filterurl = [];
	if ($('#search_box').val()) {
		filterurl.push("zoek=" + $('#search_box').val());
	}
	var themas = ['energie', 'milieu', 'gezondheid', 'gebruikskwaliteit', 'toekomstwaarde'];
	$.each(themas, function (index, key) {
		var waarde = $('#' + key + '_filter').val();
		if (waarde.substring(waarde.length - 4) != "1-10") {
			filterurl.push(key + '=' + waarde);
		}
	});
	var gemiddelde = $('#score_filter').val();
	if (gemiddelde.substring(gemiddelde.length - 4) != "0-50") {
		filterurl.push("gemiddelde" + '=' + gemiddelde);
	}
	var categorien = $('#gebouwcategorie').find('input[type =checkbox]:checked');
	if (categorien.length < 2) {
		$.each(categorien, function () {
			filterurl.push("categorie" + '=' + $(this).attr('id'));
		});
	}
	var functies = $('#gebruiksfunctie').find('input[type =checkbox]:checked');
	if (functies.length < 7) {
		var functiestring = "";
		$.each(functies, function (index, key) {
			functiestring = functiestring + $(this).attr('id');
			if (functies.length >= 1 && key != functies[functies.length - 1]) {
				functiestring = functiestring + ",";
			}
		});
		filterurl.push("functie" + '=' + functiestring);

	}
	var versies = $('#gprversie').find('input[type =checkbox]:checked');
	if (versies.length < 2) {
		$.each(versies, function () {
			filterurl.push("versie" + '=' + $(this).attr('id'));
		});
	}

	var shareurl = "";

	$.each(filterurl, function (index, key) {
		shareurl = shareurl + key;
		if (filterurl.length >= 1 && key != filterurl[filterurl.length - 1]) {
			shareurl = shareurl + "&";
		}
	});

	if (shareurl == "") {
		return "-";
	} else {
		return shareurl;
	}
}

function getTotal() {
	var projectenaantal = $('#projects').find('.item:not(.filtered)').length;
	$('.aantalprojecten').find('span').text(projectenaantal);
}