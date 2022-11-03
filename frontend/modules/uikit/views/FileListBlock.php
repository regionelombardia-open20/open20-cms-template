<?php
/**
 * @var \luya\cms\base\PhpBlockView $this
*/

use open20\design\assets\BootstrapItaliaDesignAsset;

$bootstrapItaliaAsset = BootstrapItaliaDesignAsset::register($this);

?>

<?php if (!empty($this->extraValue('fileList'))): ?>
	<div class="it-list-wrapper">
		<ul class="it-list">
			<?php foreach ($this->extraValue('fileList') as $file): ?>
				<li>
					<a target="_blank" href="<?= $file['href']; ?>" title="<?= $data['link_title'] ?>">
						<div class="it-rounded-icon">
							<?php if ((in_array(strtolower($file['extension']), ['jpg', 'png', 'jpeg', 'svg']))) : ?>
								<svg class="icon icon-image">
									<use xlink:href="<?= $bootstrapItaliaAsset->baseUrl ?>/sprite/material-sprite.svg#file-image"></use>
								</svg>
							<?php elseif ((in_array(strtolower($file['extension']), ['pdf']))) : ?>
								<svg class="icon icon-pdf">
									<use xlink:href="<?= $bootstrapItaliaAsset->baseUrl ?>/sprite/material-sprite.svg#file-pdf"></use>
								</svg>
							<?php elseif ((in_array(strtolower($file['extension']), ['doc', 'docx']))) : ?>
								<svg class="icon icon-word">
									<use xlink:href="<?= $bootstrapItaliaAsset->baseUrl ?>/sprite/material-sprite.svg#file-word"></use>
								</svg>
							<?php elseif ((in_array(strtolower($file['extension']), ['xls', 'xlsx']))) : ?>
								<svg class="icon icon-excel">
									<use xlink:href="<?= $bootstrapItaliaAsset->baseUrl ?>/sprite/material-sprite.svg#file-excel"></use>
								</svg>
							<?php elseif ((in_array(strtolower($file['extension']), ['zip', 'rar']))) : ?>
								<svg class="icon icon-secondary">
									<use xlink:href="<?= $bootstrapItaliaAsset->baseUrl ?>/sprite/material-sprite.svg#folder-zip"></use>
								</svg>
							<?php else : ?>
								<svg class="icon icon-secondary">
									<use xlink:href="<?= $bootstrapItaliaAsset->baseUrl ?>/sprite/material-sprite.svg#file-link"></use>
								</svg>
							<?php endif ?>
						</div>
						<div class="it-right-zone">
							<span class="text">
								<?= $file['caption']; ?><?php if ($this->cfgValue('showType')): ?> (<?= $file['extension'];?>)<?php endif; ?>
							</span>
						</div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>