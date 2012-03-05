<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] ツールバー
 *
 * PHP versions 4 and 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2011, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2011, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.views
 * @since			baserCMS v 1.7.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
$publishTheme = $baser->HtmlEx->themeWeb;
$baser->HtmlEx->themeWeb = 'themed/'.$baser->siteConfig['admin_theme'].'/';
$baser->Javascript->themeWeb = 'themed/'.$baser->siteConfig['admin_theme'].'/';
$baser->js(array('outerClick','jquery.fixedMenu', 'yuga'));
?>
<script type="text/javascript">
$(function(){
	$('#UserMenu').fixedMenu();
});
</script>

<div id="ToolBar">		
	<div id="ToolbarInner" class="clearfix">
		<div id="ToolMenu">
			<ul>
				<?php if($this->name == 'Installations'): ?>
				<li><?php $baser->link('インストールマニュアル', 'http://basercms.net/manuals/introductions/4.html', array('target' => '_blank')) ?></li>
				<?php elseif(empty($this->params['admin'])): ?>
				<li><?php $baser->link($baser->getImg('admin/btn_logo.png', array('alt' => 'baserCMS管理システム', 'class' => 'btn')), '/admin', array('title' => 'baserCMS管理システム')) ?></li>
				<?php else: ?>
				<li><?php $baser->link($baser->siteConfig['name'], '/') ?></li>
				<?php endif ?>
				<?php if($baser->existsEditLink()): ?>
				<li><?php $baser->editLink() ?></li>
				<?php endif ?>
				<?php if($baser->existsPublishLink()): ?>
				<li><?php $baser->publishLink() ?></li>
				<?php endif ?>
			</ul>
		</div>

	<?php if(!empty($user)): ?>
		<div id="UserMenu">
			<ul>
				<li>
					<?php $baser->link($user['real_name_1']." ".$user['real_name_2'].' '.$baser->getImg('admin/btn_dropdown.png', array('width' => 8, 'height' => 11, 'class' => 'btn')), 'javascript:void(0)', array('class' => 'title')) ?>
					<ul>
						<li><?php $baser->link('アカウント設定', array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'edit', $user['id'])) ?></li>
						<li><?php $baser->link('ログアウト', array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'logout')) ?></li>
					</ul>
				</li>
			</ul>

		</div>
	<?php endif ?>
	</div>
</div>

<?php $baser->HtmlEx->themeWeb = $publishTheme ?>