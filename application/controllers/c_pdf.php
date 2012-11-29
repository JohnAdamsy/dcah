<?php
class C_Pdf extends MY_Controller {

	public function index() {
	}

	public function form() {
		//$stylesheet = file_get_contents(base_url().'css/styles.css');
		//$html= $this->load->view('form_child_health');
		//$html = $this ->load->view('instructions');
		$stylesheet = ('
		#facilityReg td{
			width:500px;
		}
		#facilityReg  input{
			width:500px;
		}
		
		h3{
			font-size: 1.4em;
	font-family: Linux Libertine-DR;
	color: #039;
	border-bottom: solid 2px #039;
		}
		input, select{
			width:500px;
			height:60px;
			border:none;
			border-bottom:1px solid black;
		}
		
		/* Columns*/
.column, .column-wide {
	padding: 0 20px 10px 10px;
	height: auto;
}
.col {
	width: 33%;
	display: inline-block;
}
.block {
	margin-bottom: 5px;
	width: 95%;
	margin: auto;
	display: block;
	height: auto;
}
.block .column:first-child {
	border-right: 2px solid #999999;
}

td input[type=number] {
	float: left;
	padding:10px auto;
			width:300px;
			height:60px;
}
.block .column:nth-child(even) {
	float: right;
}
.col-x4 {
	width: 24%;
}
.column {
	width: 47.5%;
	padding-bottom: 2%;
	display: inline-block;
	position: relative;
}
.column-wide {
	width: 99%;
}
.column input, .column-wide input {
	display: table-row;
	padding:10px auto;
			width:300px;
			height:60px;
}
.column textarea, .column-wide textarea {
	display: block;
	float: right;
	width: 80%;
	height: 120px;
}
.col p, .col label {
}
.column-wide textarea {
	height: 90px;
}
.column label, .column-wide label {
	float: left;
	display: block;
	width: 85%;
}
.row {
	margin: 0;
}
.row, .row2 {
	width: 100%;
}
.row-title {
	width: 100%;
	color: #AA1317;
	display: block;
	margin-top: 10px;
	padding-bottom: 5px;
	padding-top: 5px;
	font-size: 1.1em;
	font-weight: bold;
	border-bottom: #999999 1px solid;
	border-top: #999999 1px solid;
}

.left {
	width: 60%;
}
.right {
	clear: all;
	width: 50%;
	height: 100%;
}
.left-wide {
	width: 45%;
}
.center-wide {
	width: 5%;
}
.right-wide {
	width: 45%;
}
.col-x7 {
	width: 14%;
}
.left, .right, .center {
	display: inline-block;
	height: auto;
}
.column .center {
	width: 10%;
	height: inherit;
}
.column-wide .center {
	width: 30%;
	border-right: 2px solid gray;
	padding: 1%;
}

.column-wide .left, .column-wide .right {
	width: 30%;
	padding: 1%;
}
.column label, .column-wide label {
	padding: 5px 5px 5px 5px;
	border-radius: 5px;
	-moz-border-radius: 2px;
	-o-border-radius: 2px;
	display: block;
}
input[type=radio] {
	display: inline-block;
	float: right;
}
input[type=number], select {
	display: inline-block;
	width: 45%;
}
select {
	float: left;
	padding: 1px;
}
option {
	width: 100%;
}
input[type=number] {
	float: right;
}
.ui-helper-hidden {
	display: none
}
.ui-helper-hidden-accessible {
	position: absolute !important;
	clip: rect(1px);
	clip: rect(1px,1px,1px,1px)
}
.ui-helper-reset {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	line-height: 1.3;
	text-decoration: none;
	font-size: 100%;
	list-style: none
}
.ui-helper-clearfix:before, .ui-helper-clearfix:after {
	content: "";
	display: table
}
.ui-helper-clearfix:after {
	clear: both
}
.ui-helper-clearfix {
	zoom: 1
}
.ui-helper-zfix {
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	position: absolute;
	opacity: 0;
	filter: Alpha(Opacity=0)
}
.ui-state-disabled {
	cursor: default !important
}
.ui-icon {
	display: block;
	text-indent: -99999px;
	overflow: hidden;
	background-repeat: no-repeat
}
.ui-widget-overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%
}
.ui-resizable {
	position: relative
}
.ui-resizable-handle {
	position: absolute;
	font-size: 0.1px;
	display: block
}
.ui-resizable-disabled .ui-resizable-handle, .ui-resizable-autohide .ui-resizable-handle {
	display: none
}
.ui-resizable-n {
	cursor: n-resize;
	height: 7px;
	width: 100%;
	top: -5px;
	left: 0
}
.ui-resizable-s {
	cursor: s-resize;
	height: 7px;
	width: 100%;
	bottom: -5px;
	left: 0
}
.ui-resizable-e {
	cursor: e-resize;
	width: 7px;
	right: -5px;
	top: 0;
	height: 100%
}
.ui-resizable-w {
	cursor: w-resize;
	width: 7px;
	left: -5px;
	top: 0;
	height: 100%
}
.ui-resizable-se {
	cursor: se-resize;
	width: 12px;
	height: 12px;
	right: 1px;
	bottom: 1px
}
.ui-resizable-sw {
	cursor: sw-resize;
	width: 9px;
	height: 9px;
	left: -5px;
	bottom: -5px
}
.ui-resizable-nw {
	cursor: nw-resize;
	width: 9px;
	height: 9px;
	left: -5px;
	top: -5px
}
.ui-resizable-ne {
	cursor: ne-resize;
	width: 9px;
	height: 9px;
	right: -5px;
	top: -5px
}
.ui-selectable-helper {
	position: absolute;
	z-index: 100;
	border: 1px dotted black
}
.ui-accordion .ui-accordion-header {
	display: block;
	cursor: pointer;
	position: relative;
	margin-top: 2px;
	padding: .5em .5em .5em .7em;
	zoom: 1
}
.ui-accordion .ui-accordion-icons {
	padding-left: 2.2em
}
.ui-accordion .ui-accordion-noicons {
	padding-left: .7em
}
.ui-accordion .ui-accordion-icons .ui-accordion-icons {
	padding-left: 2.2em
}
.ui-accordion .ui-accordion-header .ui-accordion-header-icon {
	position: absolute;
	left: .5em;
	top: 50%;
	margin-top: -8px
}
.ui-accordion .ui-accordion-content {
	padding: 1em 2.2em;
	border-top: 0;
	overflow: auto;
	zoom: 1
}
.ui-autocomplete {
	position: absolute;
	cursor: default
}
* html .ui-autocomplete {
	width: 1px
}
.ui-button {
	display: inline-block;
	position: relative;
	padding: 0;
	margin-right: .1em;
	cursor: pointer;
	text-align: center;
	zoom: 1;
	overflow: visible
}
.ui-button, .ui-button:link, .ui-button:visited, .ui-button:hover, .ui-button:active {
	text-decoration: none
}
.ui-button-icon-only {
	width: 2.2em
}
button.ui-button-icon-only {
	width: 2.4em
}
.ui-button-icons-only {
	width: 3.4em
}
button.ui-button-icons-only {
	width: 3.7em
}
.ui-button .ui-button-text {
	display: block;
	line-height: 1.4
}
.ui-button-text-only .ui-button-text {
	padding: .4em 1em
}
.ui-button-icon-only .ui-button-text, .ui-button-icons-only .ui-button-text {
	padding: .4em;
	text-indent: -9999999px
}
.ui-button-text-icon-primary .ui-button-text, .ui-button-text-icons .ui-button-text {
	padding: .4em 1em .4em 2.1em
}
.ui-button-text-icon-secondary .ui-button-text, .ui-button-text-icons .ui-button-text {
	padding: .4em 2.1em .4em 1em
}
.ui-button-text-icons .ui-button-text {
	padding-left: 2.1em;
	padding-right: 2.1em
}
input.ui-button {
	padding: .4em 1em
}
.ui-button-icon-only .ui-icon, .ui-button-text-icon-primary .ui-icon, .ui-button-text-icon-secondary .ui-icon, .ui-button-text-icons .ui-icon, .ui-button-icons-only .ui-icon {
	position: absolute;
	top: 50%;
	margin-top: -8px
}
.ui-button-icon-only .ui-icon {
	left: 50%;
	margin-left: -8px
}
.ui-button-text-icon-primary .ui-button-icon-primary, .ui-button-text-icons .ui-button-icon-primary, .ui-button-icons-only .ui-button-icon-primary {
	left: .5em
}
.ui-button-text-icon-secondary .ui-button-icon-secondary, .ui-button-text-icons .ui-button-icon-secondary, .ui-button-icons-only .ui-button-icon-secondary {
	right: .5em
}
.ui-button-text-icons .ui-button-icon-secondary, .ui-button-icons-only .ui-button-icon-secondary {
	right: .5em
}
.ui-buttonset {
	margin-right: 7px
}
.ui-buttonset .ui-button {
	margin-left: 0;
	margin-right: -.3em
}
button.ui-button::-moz-focus-inner {
	border: 0;
	padding: 0
}
.ui-datepicker {
	width: 17em;
	padding: .2em .2em 0;
	display: none
}
.ui-datepicker .ui-datepicker-header {
	position: relative;
	padding: .2em 0
}
.ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next {
	position: absolute;
	top: 2px;
	width: 1.8em;
	height: 1.8em
}
.ui-datepicker .ui-datepicker-prev-hover, .ui-datepicker .ui-datepicker-next-hover {
	top: 1px
}
.ui-datepicker .ui-datepicker-prev {
	left: 2px
}
.ui-datepicker .ui-datepicker-next {
	right: 2px
}
.ui-datepicker .ui-datepicker-prev-hover {
	left: 1px
}
.ui-datepicker .ui-datepicker-next-hover {
	right: 1px
}
.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span {
	display: block;
	position: absolute;
	left: 50%;
	margin-left: -8px;
	top: 50%;
	margin-top: -8px
}
.ui-datepicker .ui-datepicker-title {
	margin: 0 2.3em;
	line-height: 1.8em;
	text-align: center
}
.ui-datepicker .ui-datepicker-title select {
	font-size: 1em;
	margin: 1px 0
}
.ui-datepicker select.ui-datepicker-month-year {
	width: 100%
}
.ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year {
	width: 49%
}
.ui-datepicker table {
	width: 100%;
	font-size: .9em;
	border-collapse: collapse;
	margin: 0 0 .4em
}
.ui-datepicker th {
	padding: .7em .3em;
	text-align: center;
	font-weight: bold;
	border: 0
}
.ui-datepicker td {
	border: 0;
	padding: 1px
}
.ui-datepicker td span, .ui-datepicker td a {
	display: block;
	padding: .2em;
	text-align: right;
	text-decoration: none
}
.ui-datepicker .ui-datepicker-buttonpane {
	background-image: none;
	margin: .7em 0 0 0;
	padding: 0 .2em;
	border-left: 0;
	border-right: 0;
	border-bottom: 0
}
.ui-datepicker .ui-datepicker-buttonpane button {
	float: right;
	margin: .5em .2em .4em;
	cursor: pointer;
	padding: .2em .6em .3em .6em;
	width: auto;
	overflow: visible
}
.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
	float: left
}
.ui-datepicker.ui-datepicker-multi {
	width: auto
}
.ui-datepicker-multi .ui-datepicker-group {
	float: left
}
.ui-datepicker-multi .ui-datepicker-group table {
	width: 95%;
	margin: 0 auto .4em
}
.ui-datepicker-multi-2 .ui-datepicker-group {
	width: 50%
}
.ui-datepicker-multi-3 .ui-datepicker-group {
	width: 33.3%
}
.ui-datepicker-multi-4 .ui-datepicker-group {
	width: 25%
}
.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header {
	border-left-width: 0
}
.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
	border-left-width: 0
}
.ui-datepicker-multi .ui-datepicker-buttonpane {
	clear: left
}
.ui-datepicker-row-break {
	clear: both;
	width: 100%;
	font-size: 0em
}
.ui-datepicker-rtl {
	direction: rtl
}
.ui-datepicker-rtl .ui-datepicker-prev {
	right: 2px;
	left: auto
}
.ui-datepicker-rtl .ui-datepicker-next {
	left: 2px;
	right: auto
}
.ui-datepicker-rtl .ui-datepicker-prev:hover {
	right: 1px;
	left: auto
}
.ui-datepicker-rtl .ui-datepicker-next:hover {
	left: 1px;
	right: auto
}
.ui-datepicker-rtl .ui-datepicker-buttonpane {
	clear: right
}
.ui-datepicker-rtl .ui-datepicker-buttonpane button {
	float: left
}
.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current {
	float: right
}
.ui-datepicker-rtl .ui-datepicker-group {
	float: right
}
.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header {
	border-right-width: 0;
	border-left-width: 1px
}
.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
	border-right-width: 0;
	border-left-width: 1px
}
.ui-datepicker-cover {
	position: absolute;
	z-index: -1;
	filter: mask();
	top: -4px;
	left: -4px;
	width: 200px;
	height: 200px
}
.ui-dialog {
	position: absolute;
	padding: .2em;
	width: 300px;
	overflow: hidden
}
.ui-dialog .ui-dialog-titlebar {
	padding: .4em 1em;
	position: relative
}
.ui-dialog .ui-dialog-title {
	float: left;
	margin: .1em 16px .1em 0
}
.ui-dialog .ui-dialog-titlebar-close {
	position: absolute;
	right: .3em;
	top: 50%;
	width: 19px;
	margin: -10px 0 0 0;
	padding: 1px;
	height: 18px
}
.ui-dialog .ui-dialog-titlebar-close span {
	display: block;
	margin: 1px
}
.ui-dialog .ui-dialog-titlebar-close:hover, .ui-dialog .ui-dialog-titlebar-close:focus {
	padding: 0
}
.ui-dialog .ui-dialog-content {
	position: relative;
	border: 0;
	padding: .5em 1em;
	background: none;
	overflow: auto;
	zoom: 1
}
.ui-dialog .ui-dialog-buttonpane {
	text-align: left;
	border-width: 1px 0 0 0;
	background-image: none;
	margin: .5em 0 0 0;
	padding: .3em 1em .5em .4em
}
.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
	float: right
}
.ui-dialog .ui-dialog-buttonpane button {
	margin: .5em .4em .5em 0;
	cursor: pointer
}
.ui-dialog .ui-resizable-se {
	width: 14px;
	height: 14px;
	right: 3px;
	bottom: 3px
}
.ui-draggable .ui-dialog-titlebar {
	cursor: move
}
.ui-menu {
	list-style: none;
	padding: 2px;
	margin: 0;
	display: block;
	outline: none
}
.ui-menu .ui-menu {
	margin-top: -3px;
	position: absolute
}
.ui-menu .ui-menu-item {
	margin: 0;
	padding: 0;
	zoom: 1;
	width: 100%
}
.ui-menu .ui-menu-divider {
	margin: 5px -2px 5px -2px;
	height: 0;
	font-size: 0;
	line-height: 0;
	border-width: 1px 0 0 0
}
.ui-menu .ui-menu-item a {
	text-decoration: none;
	display: block;
	padding: 2px .4em;
	line-height: 1.5;
	zoom: 1;
	font-weight: normal
}
.ui-menu .ui-menu-item a.ui-state-focus, .ui-menu .ui-menu-item a.ui-state-active {
	font-weight: normal;
	margin: -1px
}
.ui-menu .ui-state-disabled {
	font-weight: normal;
	margin: .4em 0 .2em;
	line-height: 1.5
}
.ui-menu .ui-state-disabled a {
	cursor: default
}
.ui-menu-icons {
	position: relative
}
.ui-menu-icons .ui-menu-item a {
	position: relative;
	padding-left: 2em
}
.ui-menu .ui-icon {
	position: absolute;
	top: .2em;
	left: .2em
}
.ui-menu .ui-menu-icon {
	position: static;
	float: right
}
.ui-progressbar {
	height: 2em;
	text-align: left;
	overflow: hidden
}
.ui-progressbar .ui-progressbar-value {
	margin: -1px;
	height: 100%
}
.ui-slider {
	position: relative;
	text-align: left
}
.ui-slider .ui-slider-handle {
	position: absolute;
	z-index: 2;
	width: 1.2em;
	height: 1.2em;
	cursor: default
}
.ui-slider .ui-slider-range {
	position: absolute;
	z-index: 1;
	font-size: .7em;
	display: block;
	border: 0;
	background-position: 0 0
}
.ui-slider-horizontal {
	height: .8em
}
.ui-slider-horizontal .ui-slider-handle {
	top: -.3em;
	margin-left: -.6em
}
.ui-slider-horizontal .ui-slider-range {
	top: 0;
	height: 100%
}
.ui-slider-horizontal .ui-slider-range-min {
	left: 0
}
.ui-slider-horizontal .ui-slider-range-max {
	right: 0
}
.ui-slider-vertical {
	width: .8em;
	height: 100px
}
.ui-slider-vertical .ui-slider-handle {
	left: -.3em;
	margin-left: 0;
	margin-bottom: -.6em
}
.ui-slider-vertical .ui-slider-range {
	left: 0;
	width: 100%
}
.ui-slider-vertical .ui-slider-range-min {
	bottom: 0
}
.ui-slider-vertical .ui-slider-range-max {
	top: 0
}
.ui-spinner {
	position: relative;
	display: inline-block;
	overflow: hidden;
	padding: 0;
	vertical-align: middle
}
.ui-spinner-input {
	border: none;
	background: none;
	padding: 0;
	margin: .2em 0;
	vertical-align: middle;
	margin-left: .4em;
	margin-right: 22px
}
.ui-spinner-button {
	width: 16px;
	height: 50%;
	font-size: .5em;
	padding: 0;
	margin: 0;
	z-index: 100;
	text-align: center;
	position: absolute;
	cursor: default;
	display: block;
	overflow: hidden;
	right: 0
}
.ui-spinner a.ui-spinner-button {
	border-top: none;
	border-bottom: none;
	border-right: none
}
.ui-spinner .ui-icon {
	position: absolute;
	margin-top: -8px;
	top: 50%;
	left: 0
}
.ui-spinner-up {
	top: 0
}
.ui-spinner-down {
	bottom: 0
}
span.ui-spinner {
	background: none
}
.ui-spinner .ui-icon-triangle-1-s {
	background-position: -65px -16px
}
.ui-tabs {
	position: relative;
	padding: .2em;
	zoom: 1
}
.ui-tabs .ui-tabs-nav {
	margin: 0;
	padding: .2em .2em 0
}
.ui-tabs .ui-tabs-nav li {
	list-style: none;
	float: left;
	position: relative;
	top: 0;
	margin: 1px .2em 0 0;
	border-bottom: 0;
	padding: 0;
	white-space: nowrap
}
.ui-tabs .ui-tabs-nav li a {
	float: left;
	padding: .5em 1em;
	text-decoration: none
}
.ui-tabs .ui-tabs-nav li.ui-tabs-active {
	margin-bottom: -1px;
	padding-bottom: 1px
}
.ui-tabs .ui-tabs-nav li.ui-tabs-active a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-tabs-loading a {
	cursor: text
}
.ui-tabs .ui-tabs-nav li a, .ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-active a {
	cursor: pointer
}
.ui-tabs .ui-tabs-panel {
	display: block;
	border-width: 0;
	padding: 1em 1.4em;
	background: none
}
.ui-tooltip {
	padding: 8px;
	position: absolute;
	z-index: 9999;
	-o-box-shadow: 0 0 5px #aaa;
	-moz-box-shadow: 0 0 5px #aaa;
	-webkit-box-shadow: 0 0 5px #aaa;
	box-shadow: 0 0 5px #aaa
}
* html .ui-tooltip {
	background-image: none
}
body .ui-tooltip {
	border-width: 2px
}
.ui-widget {
	font-family: Lucida Grande, Lucida Sans, Arial, sans-serif;
	font-size: 1.1em
}
.ui-widget .ui-widget {
	font-size: 1em
}
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
	font-family: Lucida Grande, Lucida Sans, Arial, sans-serif;
	font-size: 1em
}
.ui-widget-content {
	border: 1px solid #a6c9e2;
	background: #fcfdfd url(images/ui-bg_inset-hard_100_fcfdfd_1x100.png) 50% bottom repeat-x;
	color: #222
}
.ui-widget-content a {
	color: #222
}
.ui-widget-header {
	border: 1px solid #4297d7;
	background: #5c9ccc url(images/ui-bg_gloss-wave_55_5c9ccc_500x100.png) 50% 50% repeat-x;
	color: #fff;
	font-weight: bold
}
.ui-widget-header a {
	color: #fff
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
	border: 1px solid #c5dbec;
	background: #dfeffc url(images/ui-bg_glass_85_dfeffc_1x400.png) 50% 50% repeat-x;
	font-weight: bold;
	color: #2e6e9e
}
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
	color: #2e6e9e;
	text-decoration: none
}
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
	border: 1px solid #79b7e7;
	background: #d0e5f5 url(images/ui-bg_glass_75_d0e5f5_1x400.png) 50% 50% repeat-x;
	font-weight: bold;
	color: #1d5987
}
.ui-state-hover a, .ui-state-hover a:hover {
	color: #1d5987;
	text-decoration: none
}
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
	border: 1px solid #79b7e7;
	background: #f5f8f9 url(images/ui-bg_inset-hard_100_f5f8f9_1x100.png) 50% 50% repeat-x;
	font-weight: bold;
	color: #e17009
}
.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited {
	color: #e17009;
	text-decoration: none
}
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
	border: 1px solid #fad42e;
	background: #fbec88 url(images/ui-bg_flat_55_fbec88_40x100.png) 50% 50% repeat-x;
	color: #363636
}
.ui-state-highlight a, .ui-widget-content .ui-state-highlight a, .ui-widget-header .ui-state-highlight a {
	color: #363636
}
.ui-state-error, .ui-widget-content .ui-state-error, .ui-widget-header .ui-state-error {
	border: 1px solid #cd0a0a;
	background: #fef1ec url(images/ui-bg_glass_95_fef1ec_1x400.png) 50% 50% repeat-x;
	color: #cd0a0a
}
.ui-state-error a, .ui-widget-content .ui-state-error a, .ui-widget-header .ui-state-error a {
	color: #cd0a0a
}
.ui-state-error-text, .ui-widget-content .ui-state-error-text, .ui-widget-header .ui-state-error-text {
	color: #cd0a0a
}
.ui-priority-primary, .ui-widget-content .ui-priority-primary, .ui-widget-header .ui-priority-primary {
	font-weight: bold
}
.ui-priority-secondary, .ui-widget-content .ui-priority-secondary, .ui-widget-header .ui-priority-secondary {
	opacity: .7;
	filter: Alpha(Opacity=70);
	font-weight: normal
}
.ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled {
	opacity: .35;
	filter: Alpha(Opacity=35);
	background-image: none
}
.ui-icon {
	width: 16px;
	height: 16px;
	background-image: url(images/ui-icons_469bdd_256x240.png)
}
.ui-widget-content .ui-icon {
	background-image: url(images/ui-icons_469bdd_256x240.png)
}
.ui-widget-header .ui-icon {
	background-image: url(images/ui-icons_d8e7f3_256x240.png)
}
.ui-state-default .ui-icon {
	background-image: url(images/ui-icons_6da8d5_256x240.png)
}
.ui-state-hover .ui-icon, .ui-state-focus .ui-icon {
	background-image: url(images/ui-icons_217bc0_256x240.png)
}
.ui-state-active .ui-icon {
	background-image: url(images/ui-icons_f9bd01_256x240.png)
}
.ui-state-highlight .ui-icon {
	background-image: url(images/ui-icons_2e83ff_256x240.png)
}
.ui-state-error .ui-icon, .ui-state-error-text .ui-icon {
	background-image: url(images/ui-icons_cd0a0a_256x240.png)
}
.ui-icon-carat-1-n {
	background-position: 0 0
}
.ui-icon-carat-1-ne {
	background-position: -16px 0
}
.ui-icon-carat-1-e {
	background-position: -32px 0
}
.ui-icon-carat-1-se {
	background-position: -48px 0
}
.ui-icon-carat-1-s {
	background-position: -64px 0
}
.ui-icon-carat-1-sw {
	background-position: -80px 0
}
.ui-icon-carat-1-w {
	background-position: -96px 0
}
.ui-icon-carat-1-nw {
	background-position: -112px 0
}
.ui-icon-carat-2-n-s {
	background-position: -128px 0
}
.ui-icon-carat-2-e-w {
	background-position: -144px 0
}
.ui-icon-triangle-1-n {
	background-position: 0 -16px
}
.ui-icon-triangle-1-ne {
	background-position: -16px -16px
}
.ui-icon-triangle-1-e {
	background-position: -32px -16px
}
.ui-icon-triangle-1-se {
	background-position: -48px -16px
}
.ui-icon-triangle-1-s {
	background-position: -64px -16px
}
.ui-icon-triangle-1-sw {
	background-position: -80px -16px
}
.ui-icon-triangle-1-w {
	background-position: -96px -16px
}
.ui-icon-triangle-1-nw {
	background-position: -112px -16px
}
.ui-icon-triangle-2-n-s {
	background-position: -128px -16px
}
.ui-icon-triangle-2-e-w {
	background-position: -144px -16px
}
.ui-icon-arrow-1-n {
	background-position: 0 -32px
}
.ui-icon-arrow-1-ne {
	background-position: -16px -32px
}
.ui-icon-arrow-1-e {
	background-position: -32px -32px
}
.ui-icon-arrow-1-se {
	background-position: -48px -32px
}
.ui-icon-arrow-1-s {
	background-position: -64px -32px
}
.ui-icon-arrow-1-sw {
	background-position: -80px -32px
}
.ui-icon-arrow-1-w {
	background-position: -96px -32px
}
.ui-icon-arrow-1-nw {
	background-position: -112px -32px
}
.ui-icon-arrow-2-n-s {
	background-position: -128px -32px
}
.ui-icon-arrow-2-ne-sw {
	background-position: -144px -32px
}
.ui-icon-arrow-2-e-w {
	background-position: -160px -32px
}
.ui-icon-arrow-2-se-nw {
	background-position: -176px -32px
}
.ui-icon-arrowstop-1-n {
	background-position: -192px -32px
}
.ui-icon-arrowstop-1-e {
	background-position: -208px -32px
}
.ui-icon-arrowstop-1-s {
	background-position: -224px -32px
}
.ui-icon-arrowstop-1-w {
	background-position: -240px -32px
}
.ui-icon-arrowthick-1-n {
	background-position: 0 -48px
}
.ui-icon-arrowthick-1-ne {
	background-position: -16px -48px
}
.ui-icon-arrowthick-1-e {
	background-position: -32px -48px
}
.ui-icon-arrowthick-1-se {
	background-position: -48px -48px
}
.ui-icon-arrowthick-1-s {
	background-position: -64px -48px
}
.ui-icon-arrowthick-1-sw {
	background-position: -80px -48px
}
.ui-icon-arrowthick-1-w {
	background-position: -96px -48px
}
.ui-icon-arrowthick-1-nw {
	background-position: -112px -48px
}
.ui-icon-arrowthick-2-n-s {
	background-position: -128px -48px
}
.ui-icon-arrowthick-2-ne-sw {
	background-position: -144px -48px
}
.ui-icon-arrowthick-2-e-w {
	background-position: -160px -48px
}
.ui-icon-arrowthick-2-se-nw {
	background-position: -176px -48px
}
.ui-icon-arrowthickstop-1-n {
	background-position: -192px -48px
}
.ui-icon-arrowthickstop-1-e {
	background-position: -208px -48px
}
.ui-icon-arrowthickstop-1-s {
	background-position: -224px -48px
}
.ui-icon-arrowthickstop-1-w {
	background-position: -240px -48px
}
.ui-icon-arrowreturnthick-1-w {
	background-position: 0 -64px
}
.ui-icon-arrowreturnthick-1-n {
	background-position: -16px -64px
}
.ui-icon-arrowreturnthick-1-e {
	background-position: -32px -64px
}
.ui-icon-arrowreturnthick-1-s {
	background-position: -48px -64px
}
.ui-icon-arrowreturn-1-w {
	background-position: -64px -64px
}
.ui-icon-arrowreturn-1-n {
	background-position: -80px -64px
}
.ui-icon-arrowreturn-1-e {
	background-position: -96px -64px
}
.ui-icon-arrowreturn-1-s {
	background-position: -112px -64px
}
.ui-icon-arrowrefresh-1-w {
	background-position: -128px -64px
}
.ui-icon-arrowrefresh-1-n {
	background-position: -144px -64px
}
.ui-icon-arrowrefresh-1-e {
	background-position: -160px -64px
}
.ui-icon-arrowrefresh-1-s {
	background-position: -176px -64px
}
.ui-icon-arrow-4 {
	background-position: 0 -80px
}
.ui-icon-arrow-4-diag {
	background-position: -16px -80px
}
.ui-icon-extlink {
	background-position: -32px -80px
}
.ui-icon-newwin {
	background-position: -48px -80px
}
.ui-icon-refresh {
	background-position: -64px -80px
}
.ui-icon-shuffle {
	background-position: -80px -80px
}
.ui-icon-transfer-e-w {
	background-position: -96px -80px
}
.ui-icon-transferthick-e-w {
	background-position: -112px -80px
}
.ui-icon-folder-collapsed {
	background-position: 0 -96px
}
.ui-icon-folder-open {
	background-position: -16px -96px
}
.ui-icon-document {
	background-position: -32px -96px
}
.ui-icon-document-b {
	background-position: -48px -96px
}
.ui-icon-note {
	background-position: -64px -96px
}
.ui-icon-mail-closed {
	background-position: -80px -96px
}
.ui-icon-mail-open {
	background-position: -96px -96px
}
.ui-icon-suitcase {
	background-position: -112px -96px
}
.ui-icon-comment {
	background-position: -128px -96px
}
.ui-icon-person {
	background-position: -144px -96px
}
.ui-icon-print {
	background-position: -160px -96px
}
.ui-icon-trash {
	background-position: -176px -96px
}
.ui-icon-locked {
	background-position: -192px -96px
}
.ui-icon-unlocked {
	background-position: -208px -96px
}
.ui-icon-bookmark {
	background-position: -224px -96px
}
.ui-icon-tag {
	background-position: -240px -96px
}
.ui-icon-home {
	background-position: 0 -112px
}
.ui-icon-flag {
	background-position: -16px -112px
}
.ui-icon-calendar {
	background-position: -32px -112px
}
.ui-icon-cart {
	background-position: -48px -112px
}
.ui-icon-pencil {
	background-position: -64px -112px
}
.ui-icon-clock {
	background-position: -80px -112px
}
.ui-icon-disk {
	background-position: -96px -112px
}
.ui-icon-calculator {
	background-position: -112px -112px
}
.ui-icon-zoomin {
	background-position: -128px -112px
}
.ui-icon-zoomout {
	background-position: -144px -112px
}
.ui-icon-search {
	background-position: -160px -112px
}
.ui-icon-wrench {
	background-position: -176px -112px
}
.ui-icon-gear {
	background-position: -192px -112px
}
.ui-icon-heart {
	background-position: -208px -112px
}
.ui-icon-star {
	background-position: -224px -112px
}
.ui-icon-link {
	background-position: -240px -112px
}
.ui-icon-cancel {
	background-position: 0 -128px
}
.ui-icon-plus {
	background-position: -16px -128px
}
.ui-icon-plusthick {
	background-position: -32px -128px
}
.ui-icon-minus {
	background-position: -48px -128px
}
.ui-icon-minusthick {
	background-position: -64px -128px
}
.ui-icon-close {
	background-position: -80px -128px
}
.ui-icon-closethick {
	background-position: -96px -128px
}
.ui-icon-key {
	background-position: -112px -128px
}
.ui-icon-lightbulb {
	background-position: -128px -128px
}
.ui-icon-scissors {
	background-position: -144px -128px
}
.ui-icon-clipboard {
	background-position: -160px -128px
}
.ui-icon-copy {
	background-position: -176px -128px
}
.ui-icon-contact {
	background-position: -192px -128px
}
.ui-icon-image {
	background-position: -208px -128px
}
.ui-icon-video {
	background-position: -224px -128px
}
.ui-icon-script {
	background-position: -240px -128px
}
.ui-icon-alert {
	background-position: 0 -144px
}
.ui-icon-info {
	background-position: -16px -144px
}
.ui-icon-notice {
	background-position: -32px -144px
}
.ui-icon-help {
	background-position: -48px -144px
}
.ui-icon-check {
	background-position: -64px -144px
}
.ui-icon-bullet {
	background-position: -80px -144px
}
.ui-icon-radio-on {
	background-position: -96px -144px
}
.ui-icon-radio-off {
	background-position: -112px -144px
}
.ui-icon-pin-w {
	background-position: -128px -144px
}
.ui-icon-pin-s {
	background-position: -144px -144px
}
.ui-icon-play {
	background-position: 0 -160px
}
.ui-icon-pause {
	background-position: -16px -160px
}
.ui-icon-seek-next {
	background-position: -32px -160px
}
.ui-icon-seek-prev {
	background-position: -48px -160px
}
.ui-icon-seek-end {
	background-position: -64px -160px
}
.ui-icon-seek-start {
	background-position: -80px -160px
}
.ui-icon-seek-first {
	background-position: -80px -160px
}
.ui-icon-stop {
	background-position: -96px -160px
}
.ui-icon-eject {
	background-position: -112px -160px
}
.ui-icon-volume-off {
	background-position: -128px -160px
}
.ui-icon-volume-on {
	background-position: -144px -160px
}
.ui-icon-power {
	background-position: 0 -176px
}
.ui-icon-signal-diag {
	background-position: -16px -176px
}
.ui-icon-signal {
	background-position: -32px -176px
}
.ui-icon-battery-0 {
	background-position: -48px -176px
}
.ui-icon-battery-1 {
	background-position: -64px -176px
}
.ui-icon-battery-2 {
	background-position: -80px -176px
}
.ui-icon-battery-3 {
	background-position: -96px -176px
}
.ui-icon-circle-plus {
	background-position: 0 -192px
}
.ui-icon-circle-minus {
	background-position: -16px -192px
}
.ui-icon-circle-close {
	background-position: -32px -192px
}
.ui-icon-circle-triangle-e {
	background-position: -48px -192px
}
.ui-icon-circle-triangle-s {
	background-position: -64px -192px
}
.ui-icon-circle-triangle-w {
	background-position: -80px -192px
}
.ui-icon-circle-triangle-n {
	background-position: -96px -192px
}
.ui-icon-circle-arrow-e {
	background-position: -112px -192px
}
.ui-icon-circle-arrow-s {
	background-position: -128px -192px
}
.ui-icon-circle-arrow-w {
	background-position: -144px -192px
}
.ui-icon-circle-arrow-n {
	background-position: -160px -192px
}
.ui-icon-circle-zoomin {
	background-position: -176px -192px
}
.ui-icon-circle-zoomout {
	background-position: -192px -192px
}
.ui-icon-circle-check {
	background-position: -208px -192px
}
.ui-icon-circlesmall-plus {
	background-position: 0 -208px
}
.ui-icon-circlesmall-minus {
	background-position: -16px -208px
}
.ui-icon-circlesmall-close {
	background-position: -32px -208px
}
.ui-icon-squaresmall-plus {
	background-position: -48px -208px
}
.ui-icon-squaresmall-minus {
	background-position: -64px -208px
}
.ui-icon-squaresmall-close {
	background-position: -80px -208px
}
.ui-icon-grip-dotted-vertical {
	background-position: 0 -224px
}
.ui-icon-grip-dotted-horizontal {
	background-position: -16px -224px
}
.ui-icon-grip-solid-vertical {
	background-position: -32px -224px
}
.ui-icon-grip-solid-horizontal {
	background-position: -48px -224px
}
.ui-icon-gripsmall-diagonal-se {
	background-position: -64px -224px
}
.ui-icon-grip-diagonal-se {
	background-position: -80px -224px
}
.ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl {
	-moz-border-radius-topleft: 5px;
	-webkit-border-top-left-radius: 5px;
	-khtml-border-top-left-radius: 5px;
	border-top-left-radius: 5px
}
.ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr {
	-moz-border-radius-topright: 5px;
	-webkit-border-top-right-radius: 5px;
	-khtml-border-top-right-radius: 5px;
	border-top-right-radius: 5px
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
	-moz-border-radius-bottomleft: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-khtml-border-bottom-left-radius: 5px;
	border-bottom-left-radius: 5px
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
	-moz-border-radius-bottomright: 5px;
	-webkit-border-bottom-right-radius: 5px;
	-khtml-border-bottom-right-radius: 5px;
	border-bottom-right-radius: 5px
}
.ui-widget-overlay {
	background: #aaa url(images/ui-bg_flat_0_aaaaaa_40x100.png) 50% 50% repeat-x;
	opacity: .3;
	filter: Alpha(Opacity=30)
}
.ui-widget-shadow {
	margin: -8px 0 0 -8px;
	padding: 8px;
	background: #aaa url(images/ui-bg_flat_0_aaaaaa_40x100.png) 50% 50% repeat-x;
	opacity: .3;
	filter: Alpha(Opacity=30);
	-moz-border-radius: 8px;
	-khtml-border-radius: 8px;
	-webkit-border-radius: 8px;
	border-radius: 8px
}		
		');
		$html = ('
<!-- begin facility  td --->
<h3 align="center">FACILITY REGISTRATION</h3>
<table id="facilityReg">

	<tr>
		<td class="row-title"> Facility Information</td>
		<td></td>
	</tr>

	<tr>
		<td><label>Facility Name:</label></td>
		<td>
		<input type="text" name="facilityName" class="cloned" readonly="readonly" id="facilityName"/>
		</td>
	</tr>
	<tr>
		<td><label>Facility Type:</label></td><td>
		<input type="text" name="facilityContactPerson" id="facilityContactPerson" class="cloned"/></td>
	</tr>
	<tr>
		<td><label>Facility Level:</label></td><td>
		<input type="text" name="facilityContactPerson" id="facilityContactPerson" class="cloned"/></td>
	</tr>
	<tr>
		<td><label>Owned By:</label></td><td>
		<input type="text" name="facilityContactPerson" id="facilityContactPerson" class="cloned"/></td>
	</tr>
	<tr>
		<td><label>Province:</label></td><td>
		<input type="text" name="facilityContactPerson" id="facilityContactPerson" class="cloned"/></td>
	</tr>
	<tr>
		<td><label>District:</label></td><td>
		<input type="text" name="facilityContactPerson" id="facilityContactPerson" class="cloned"/></td>
	</tr>
	<tr>
		<td><label>County:</label></td><td>
		<input type="text" name="facilityContactPerson" id="facilityContactPerson" class="cloned"/></td>
		</td>
	</tr>
	<tr>
		<td class="row-title"> In Charge Contact Information</td>
	</tr>
	<tr>
		<td><label>Name:</label></td><td>
		<input type="text" name="facilityContactPerson" id="facilityContactPerson" class="cloned"/>
		</td>
	</tr>
	<tr>
		<td><label>Telephone:</label></td><td></td>
	</tr>
	<tr>
		<td><label>Cell 1:</label></td><td>
		<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14" class="cloned numbers"/>
		</td>

	</tr>
	<tr>
		<td><label>Cell 2:</label></td><td>
		<input type="text" name="facilityAltTelephone" id="facilityAltTelephone" maxlength="14" class="numbers"/>
		</td>

	</tr>
	<tr>
		<td><label>Email:</label></td><td>
		<input type="email" name="facilityEmail" id="facilityEmail" maxlength="90" class="cloned"/>
		<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
		</td>
		</td>
	</tr>
	<tr>
		<td class="row-title"> MCH Contact</td>
	</tr>
	<tr>
		<td><label>Name:</label></td><td>
		<input type="text" name="MCHContactPerson" id="MCHContactPerson" class="cloned" />
		</td>
	</tr>
	<tr>
		<td><label>Telephone:</label></td>
		<td></td>

	</tr>
	<tr>
		<td><label>Cell 1:</label></td>
		<td>
		<input type="text" name="MCHTelephone" id="MCHTelephone" maxlength="14" class="cloned numbers"/>
		</td>

	</tr>
	<tr>
		<td><label>Cell 2:</label></td>
		<td>
		<input type="text" name="MCHAltTelephone" id="MCHAltTelephone" maxlength="14" class="numbers"/>
		</td>

	</tr>
	<tr>
		<td><label>Email:</label></td>
		<td>
		<input type="email" name="MCHEmail" id="MCHEmail" maxlength="90" class="cloned"/>
		</td>
	</tr>
	<tr>
		<td class="row-title"> Maternity Contact </td>
	</tr>

	<tr>
		<td><label><b>Tick the box on the right if no Maternity Contact Information is available</b></label></td>
		<td class="center">
		<input type="checkbox" name="noMaternityContact" id="noMaternityContact"di title="check this box if Maternity Contact Information is not available"/>
		</td>

	</tr>

	<tr>
		<td><label>Name:</label></td>
		<td>
		<input type="text" name="MaternityContactPerson" id="MaternityContactPerson" class="cloned"/>
		</td>
	</tr>
	<tr>
		<td><label>Telephone:</label></td>
		<td></td>

	</tr>

	<tr>
		<td><label>Cell 1:</label></td>
		<td>
		<input type="text" name="MaternityTelephone" id="MaternityTelephone" maxlength="14" class="cloned numbers"/>
		</td>

	</tr>

	<tr>
		<td><label>Cell 2:</label></td>
		<td>
		<input type="text" name="MaternityAltTelephone" id="MaternityAltTelephone" maxlength="14" class="numbers"/>
		</td>

	</tr>

	<tr>
		<td><label>Email:</label></td>
		<td>
		<input type="email" name="MaternityEmail" id="MaternityEmail" maxlength="90" class="cloned"/>
		</td>
	</tr>

</table>
<!--end facility table-->

		');
		$this -> load -> library('mpdf');
		$this -> mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
		$this -> mpdf -> SetTitle('DCAH Assessment Tool');
		$this -> mpdf -> SetHTMLHeader('<em>DCAH Assessment Tool</em>');
        $this -> mpdf -> SetHTMLFooter('<em>DCAH Assessment Tool</em>');
		$this -> mpdf -> simpleTables = true;
		$this -> mpdf -> WriteHTML($stylesheet, 1);
		$this -> mpdf -> WriteHTML($html, 2);
		$report_name = 'DCAH Assessment Tool' . ".pdf";
		$this -> mpdf -> Output($report_name, 'D');

	}

}
