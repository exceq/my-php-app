<?php
/* @var $list app\models\Category[] */
/* @var $categoryItems array Category Items */
use kartik\sidenav\SideNav;

?>

<?php
echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'encodeLabels' => false,
    'heading' => "Категории",
    'items' => $categoryItems,
]);
?>
