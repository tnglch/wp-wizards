/**
 * Main menu: mobile toggle and dropdown buttons.
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */
( function () {
	var toggle = document.querySelector( '.menu-toggle' );
	var nav = document.getElementById( 'menu-principal' );
	if ( ! nav ) {
		return;
	}

	function setOpen( el, button, open ) {
		el.classList.toggle( 'is-open', open );
		button.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
	}

	if ( toggle ) {
		toggle.addEventListener( 'click', function () {
			setOpen( nav, toggle, ! nav.classList.contains( 'is-open' ) );
		} );
	}

	// One button per parent item, so dropdowns work on touch screens and by keyboard.
	nav.querySelectorAll( '.menu-item-has-children' ).forEach( function ( item, i ) {
		var link = item.querySelector( ':scope > a' );
		var sub = item.querySelector( ':scope > .sub-menu' );
		if ( ! link || ! sub ) {
			return;
		}
		sub.id = sub.id || 'sous-menu-' + i;
		var btn = document.createElement( 'button' );
		btn.type = 'button';
		btn.className = 'submenu-toggle';
		btn.setAttribute( 'aria-expanded', 'false' );
		btn.setAttribute( 'aria-controls', sub.id );
		btn.setAttribute( 'aria-label', 'Sous-menu ' + link.textContent.trim() );
		link.after( btn );
		btn.addEventListener( 'click', function () {
			setOpen( item, btn, ! item.classList.contains( 'is-open' ) );
		} );
	} );

	document.addEventListener( 'keydown', function ( e ) {
		if ( e.key !== 'Escape' ) {
			return;
		}
		nav.querySelectorAll( '.is-open' ).forEach( function ( item ) {
			var btn = item.querySelector( ':scope > .submenu-toggle' );
			if ( btn ) {
				setOpen( item, btn, false );
			}
		} );
		if ( toggle && nav.classList.contains( 'is-open' ) ) {
			setOpen( nav, toggle, false );
			toggle.focus();
		}
	} );

	document.addEventListener( 'click', function ( e ) {
		if ( toggle && nav.classList.contains( 'is-open' ) && ! nav.contains( e.target ) && ! toggle.contains( e.target ) ) {
			setOpen( nav, toggle, false );
		}
	} );
} )();
