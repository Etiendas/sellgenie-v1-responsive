/* Use this script if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'entypo\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-mail' : '&#xe000;',
			'icon-directions' : '&#xe001;',
			'icon-mouse' : '&#xe002;',
			'icon-mobile' : '&#xe003;',
			'icon-feather' : '&#xe004;',
			'icon-paperclip' : '&#xe005;',
			'icon-user' : '&#xe006;',
			'icon-user-add' : '&#xe007;',
			'icon-vcard' : '&#xe008;',
			'icon-export' : '&#xe009;',
			'icon-house' : '&#xe00a;',
			'icon-comment' : '&#xe00b;',
			'icon-chat' : '&#xe00c;',
			'icon-link' : '&#xe00d;',
			'icon-flag' : '&#xe00e;',
			'icon-cog' : '&#xe00f;',
			'icon-tag' : '&#xe010;',
			'icon-new' : '&#xe011;',
			'icon-key' : '&#xe012;',
			'icon-network' : '&#xe013;',
			'icon-droplet' : '&#xe014;',
			'icon-cd' : '&#xe015;',
			'icon-calendar' : '&#xe016;',
			'icon-clock' : '&#xe017;',
			'icon-lifebuoy' : '&#xe018;',
			'icon-keyboard' : '&#xe019;',
			'icon-arrow-right' : '&#xe01a;',
			'icon-arrow-left' : '&#xe01b;',
			'icon-arrow-down' : '&#xe01c;',
			'icon-arrow-up' : '&#xe01d;',
			'icon-arrow-left-2' : '&#xe01e;',
			'icon-arrow-down-2' : '&#xe01f;',
			'icon-arrow-up-2' : '&#xe020;',
			'icon-untitled' : '&#xe021;',
			'icon-facebook' : '&#xe022;',
			'icon-twitter' : '&#xe023;',
			'icon-pinterest' : '&#xe024;',
			'icon-instagram' : '&#xe025;',
			'icon-vimeo' : '&#xe026;',
			'icon-cloud' : '&#xe027;',
			'icon-pictures' : '&#xe028;',
			'icon-list' : '&#xe029;',
			'icon-cart' : '&#xe02a;',
			'icon-thumbs-up' : '&#xe02b;',
			'icon-thumbs-down' : '&#xe02c;',
			'icon-star' : '&#xe02d;',
			'icon-star-2' : '&#xe02e;',
			'icon-cone' : '&#xe02f;',
			'icon-lock' : '&#xe030;',
			'icon-lock-open' : '&#xe031;',
			'icon-infinity' : '&#xe032;',
			'icon-info' : '&#xe033;',
			'icon-statistics' : '&#xe034;',
			'icon-bars' : '&#xe035;',
			'icon-users' : '&#xe036;',
			'icon-compass' : '&#xe037;',
			'icon-map' : '&#xe038;',
			'icon-share' : '&#xe039;',
			'icon-tools' : '&#xe03a;',
			'icon-googleplus' : '&#xe03c;',
			'icon-search' : '&#xe03b;',
			'icon-popup' : '&#xe03d;',
			'icon-quote' : '&#xe03e;',
			'icon-camera' : '&#xe03f;',
			'icon-megaphone' : '&#xe040;',
			'icon-shuffle' : '&#xe041;',
			'icon-ccw' : '&#xe042;',
			'icon-history' : '&#xe043;',
			'icon-cw' : '&#xe044;',
			'icon-cycle' : '&#xe045;',
			'icon-warning' : '&#xe046;',
			'icon-help' : '&#xe047;',
			'icon-info-2' : '&#xe048;',
			'icon-dot' : '&#xe049;',
			'icon-dots' : '&#xe04a;',
			'icon-ellipsis' : '&#xe04b;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; i < els.length; i += 1) {
		el = els[i];
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c) {
			addIcon(el, icons[c[0]]);
		}
	}
};