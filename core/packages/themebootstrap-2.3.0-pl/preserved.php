<?php return array (
  '21a4133ea08f9f0cbfbe277820dc223f' => 
  array (
    'criteria' => 
    array (
      'name' => 'Head',
    ),
    'object' => 
    array (
      'id' => 25,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'Head',
      'description' => 'Head of site with scripts and styles',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '<meta charset="[[++modx_charset]]">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<base href="[[++site_url]]" />
<title>[[!pdoTitle]] / [[++site_name]]</title>

<!-- You can add theme from bootswatch.com: just add it into &cssSources=``.
For example: [[++assets_url]]components/themebootstrap/css/slate/bootstrap.min.css-->
[[MinifyX?
	&minifyCss=`1`
	&registerCss=`1`
	&cssSources=`
		[[++assets_url]]components/themebootstrap/css/bootstrap.min.css,
		[[++assets_url]]components/themebootstrap/css/add.css
	`
	&minifyJs=`1`
	&registerJs=`1`
	&jsSources=`
		[[++assets_url]]components/themebootstrap/js/bootstrap.min.js
	`
]]

<script src="[[++assets_url]]components/themebootstrap/js/jquery.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'assets/components/themebootstrap/elements/chunks/chunk.head.tpl',
      'content' => '<meta charset="[[++modx_charset]]">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<base href="[[++site_url]]" />
<title>[[!pdoTitle]] / [[++site_name]]</title>

<!-- You can add theme from bootswatch.com: just add it into &cssSources=``.
For example: [[++assets_url]]components/themebootstrap/css/slate/bootstrap.min.css-->
[[MinifyX?
	&minifyCss=`1`
	&registerCss=`1`
	&cssSources=`
		[[++assets_url]]components/themebootstrap/css/bootstrap.min.css,
		[[++assets_url]]components/themebootstrap/css/add.css
	`
	&minifyJs=`1`
	&registerJs=`1`
	&jsSources=`
		[[++assets_url]]components/themebootstrap/js/bootstrap.min.js
	`
]]

<script src="[[++assets_url]]components/themebootstrap/js/jquery.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
',
    ),
  ),
  'ddd5119203d2a2ca50eef92dde343a5d' => 
  array (
    'criteria' => 
    array (
      'name' => 'Navbar',
    ),
    'object' => 
    array (
      'id' => 26,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'Navbar',
      'description' => 'Navbar with main navigation',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '<!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">[[++site_name]]</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				[[pdoMenu?
					&startId=`0`
					&level=`2`
					&tplParentRow=`@INLINE
					<li class="[[+classnames]] dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" [[+attributes]]>[[+menutitle]]<b class="caret"></b></a>
						<ul class="dropdown-menu">[[+wrapper]]</ul>
					</li>`
					&tplOuter=`@INLINE [[+wrapper]]`
				]]
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'assets/components/themebootstrap/elements/chunks/chunk.navbar.tpl',
      'content' => '<!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">[[++site_name]]</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				[[pdoMenu?
					&startId=`0`
					&level=`2`
					&tplParentRow=`@INLINE
					<li class="[[+classnames]] dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" [[+attributes]]>[[+menutitle]]<b class="caret"></b></a>
						<ul class="dropdown-menu">[[+wrapper]]</ul>
					</li>`
					&tplOuter=`@INLINE [[+wrapper]]`
				]]
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>',
    ),
  ),
  'abf20109b1b32ca30a16e794eaa971a5' => 
  array (
    'criteria' => 
    array (
      'name' => 'Footer',
    ),
    'object' => 
    array (
      'id' => 27,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'Footer',
      'description' => 'Chunk with footer',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '<footer>
	<div class="row">
		<div class="col-lg-8">
			<p><small>
				total time: [^t^]<br/>
				query time: [^qt^]<br/>
				queries: [^q^]
			</small></p>
		</div>
		<div class="col-lg-4">
			<p class="">&copy;2015 [[++site_name]]</p>
			<a href="http://bezumkin.ru/">[[++cultureKey:is=`ru`:then=`Василий Наумкин`:else=`Vasiliy Naumkin`]]</a>
		</div>
	</div>
</footer>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'assets/components/themebootstrap/elements/chunks/chunk.footer.tpl',
      'content' => '<footer>
	<div class="row">
		<div class="col-lg-8">
			<p><small>
				total time: [^t^]<br/>
				query time: [^qt^]<br/>
				queries: [^q^]
			</small></p>
		</div>
		<div class="col-lg-4">
			<p class="">&copy;2015 [[++site_name]]</p>
			<a href="http://bezumkin.ru/">[[++cultureKey:is=`ru`:then=`Василий Наумкин`:else=`Vasiliy Naumkin`]]</a>
		</div>
	</div>
</footer>',
    ),
  ),
  '8eddbabceb71f4206c374dd7608b03ea' => 
  array (
    'criteria' => 
    array (
      'name' => 'Content.main',
    ),
    'object' => 
    array (
      'id' => 28,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'Content.main',
      'description' => 'Content of main page',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '<h3>[[++site_name]]</h3>

[[*content]]

[[!pdoPage?
	&element=`pdoResources`
	&parents=`0`
	&useWeblinkUrl=`1`
	&tpl=`@INLINE <p>[[+idx]]. <a href="[[+link]]">[[+pagetitle]]</a></p>`
	&tplPageWrapper=`@INLINE <ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul>`
]]

[[!+page.nav]]',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'assets/components/themebootstrap/elements/chunks/chunk.content.main.tpl',
      'content' => '<h3>[[++site_name]]</h3>

[[*content]]

[[!pdoPage?
	&element=`pdoResources`
	&parents=`0`
	&useWeblinkUrl=`1`
	&tpl=`@INLINE <p>[[+idx]]. <a href="[[+link]]">[[+pagetitle]]</a></p>`
	&tplPageWrapper=`@INLINE <ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul>`
]]

[[!+page.nav]]',
    ),
  ),
  '99a4456d18d63675b0133dc5f72d287d' => 
  array (
    'criteria' => 
    array (
      'name' => 'Content.inner',
    ),
    'object' => 
    array (
      'id' => 29,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'Content.inner',
      'description' => 'Content of inner pages',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '<h3>[[*longtitle:default=`[[*pagetitle]]`]]</h3>

[[*content]]',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'assets/components/themebootstrap/elements/chunks/chunk.content.inner.tpl',
      'content' => '<h3>[[*longtitle:default=`[[*pagetitle]]`]]</h3>

[[*content]]',
    ),
  ),
  'fcc56572818e42c93c0712712a8a2024' => 
  array (
    'criteria' => 
    array (
      'name' => 'Crumbs',
    ),
    'object' => 
    array (
      'id' => 30,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'Crumbs',
      'description' => 'Breadcrumbs navigation',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '[[pdoCrumbs?
	&showAtHome=`0`
	&showHome=`1`
	&outputSeparator=``
	&tpl=`@INLINE <li><a href="[[+link]]">[[+menutitle]]</a></li>`
	&tplCurrent=`@INLINE <li class="active">[[+menutitle]]</li>`
	&tplWrapper=`@INLINE <ol class="breadcrumb">[[+output]]</ol>`
]]',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'assets/components/themebootstrap/elements/chunks/chunk.crumbs.tpl',
      'content' => '[[pdoCrumbs?
	&showAtHome=`0`
	&showHome=`1`
	&outputSeparator=``
	&tpl=`@INLINE <li><a href="[[+link]]">[[+menutitle]]</a></li>`
	&tplCurrent=`@INLINE <li class="active">[[+menutitle]]</li>`
	&tplWrapper=`@INLINE <ol class="breadcrumb">[[+output]]</ol>`
]]',
    ),
  ),
  '96bc361215e1ee0d884f672ab50d9a8b' => 
  array (
    'criteria' => 
    array (
      'templatename' => 'Bootstrap.main',
    ),
    'object' => 
    array (
      'id' => 2,
      'source' => 1,
      'property_preprocess' => 0,
      'templatename' => 'Bootstrap.main',
      'description' => 'Template for main page with documents list',
      'editor_type' => 0,
      'category' => 0,
      'icon' => '',
      'template_type' => 0,
      'content' => '<!DOCTYPE html>
<html lang="en">
	<head>
		[[$Head]]
	</head>
	<body>
		[[$Navbar]]
		<div class="container">
			<div id="content" class="main">
				[[$Content.main]]
			</div>
			[[$Footer]]
		</div>
	</body>
</html>
',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'assets/components/themebootstrap/elements/templates/template.main.tpl',
    ),
  ),
  '23c795ed4c105990459f6b346830e247' => 
  array (
    'criteria' => 
    array (
      'templatename' => 'Bootstrap.inner',
    ),
    'object' => 
    array (
      'id' => 3,
      'source' => 1,
      'property_preprocess' => 0,
      'templatename' => 'Bootstrap.inner',
      'description' => 'Template for inner pages with display of content',
      'editor_type' => 0,
      'category' => 0,
      'icon' => '',
      'template_type' => 0,
      'content' => '<!DOCTYPE html>
<html>
	<head>
		[[$Head]]
	</head>
	<body>
		[[$Navbar]]
		<div class="container">
			[[$Crumbs]]
			<div id="content" class="inner">
				[[$Content.inner]]
			</div>
			[[$Footer]]
		</div>
	</body>
</html>
',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'assets/components/themebootstrap/elements/templates/template.inner.tpl',
    ),
  ),
);