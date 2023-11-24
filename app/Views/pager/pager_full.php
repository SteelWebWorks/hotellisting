<div class="w-max mx-auto py-4">
<nav>
  <ul class="flex items-center -space-x-px h-10 text-base">
  <?php if ($pager->hasPreviousPage()): ?>
        <li>
            <a class="flex items-center justify-center px-4 h-10 leading-tight border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white rounded-s-lg" href="<?=$pager->getFirst()?>" aria-label="<?=lang('Pager.first')?>">
                <span aria-hidden="true"><?=lang('Pager.first')?></span>
            </a>
        </li>
        <li>
            <a class="flex items-center justify-center px-4 h-10 leading-tight border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white" href="<?=$pager->getPreviousPage()?>" aria-label="<?=lang('Pager.previous')?>">
                <span aria-hidden="true"><?=lang('Pager.previous')?></span>
            </a>
        </li>
    <?php endif?>

    <?php foreach ($pager->links() as $index => $link): ?>
        <li>
            <a <?=$link['active'] ? 'aria-current="page"' : ''?> href="<?=$link['uri']?>" class="<?=$link['active'] ? 'bg-gray-700' : 'bg-gray-800 hover:bg-gray-700'?> flex items-center justify-center px-4 h-10 leading-tight border text-gray-400 hover:text-white border-gray-700 <?php if (!$pager->hasPreviousPage() && $index == 0): ?> rounded-s-lg <?php endif?> <?php if (!$pager->hasNextPage() && $index == count($pager->links()) - 1): ?> rounded-e-lg <?php endif?>">
                <?=$link['title']?>
            </a>
        </li>
    <?php endforeach?>

    <?php if ($pager->hasNextPage()): ?>
        <li>
            <a class="flex items-center justify-center px-4 h-10 leading-tight border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white" href="<?=$pager->getNextPage()?>" aria-label="<?=lang('Pager.next')?>">
                <span aria-hidden="true"><?=lang('Pager.next')?></span>
            </a>
        </li>
        <li>
            <a class="flex items-center justify-center px-4 h-10 leading-tight border bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white rounded-e-lg" href="<?=$pager->getLast()?>" aria-label="<?=lang('Pager.last')?>">
                <span aria-hidden="true"><?=lang('Pager.last')?></span>
            </a>
        </li>
    <?php endif?>
  </ul>
</nav>
</div>
