<?php
$items = [
    [
        'icon' => 'bi bi-speedometer',
        'text' => 'Dashboard',
        'route' => 'admin',
    ],
    [
        'icon' => 'bi bi-gear',
        'text' => 'Configuración',
        'treeview' => [
            [
                'icon' => 'bi bi-person-fill-gear',
                'text' => 'Usuarios',
                'route' => 'usuarios'
            ],
            [
                'icon' => 'bi bi-list-ul',
                'text' => 'Parametros',
                'route' => 'parametros'
            ]
        ]
    ]
];


/*
 * **************** EXAMPLE **********************
    [
        'icon' => 'bi bi-speedometer',
        'text' => 'Dashboard',
        'route' => 'admin',
    ],
    [
        'icon' => 'bi bi-gear',
        'text' => 'Configuración',
        'treeview' => [
            [
                'icon' => 'bi bi-person-fill-gear',
                'text' => 'Usuarios',
                'route' => 'usuarios'
            ],
            [
                'icon' => 'bi bi-circle',
                'text' => 'Parametros',
                'route' => 'parametros'
            ]
        ]
    ]
 */


?>



<?php
//***********************************************  Dispash Sidebar *****************************************
foreach ($items as $item) {

    if (isset($item['treeview']) && is_array($item['treeview'])) {

        $menu_open = null;
        $show = false;
        foreach ($item['treeview'] as $value){
            if (getURLActual() == route($value['route'])){
                $menu_open = 'menu-open';
            }
            if (\app\Providers\Auth::validatePermissions($value['route'])){
                $show = true;
            }
        }

        if ($show){
?>
        <li class="nav-item <?= $menu_open ?>">
            <a href="#" class="nav-link <?= $menu_open ?>">
                <i class="nav-icon <?= $item['icon'] ?>"></i>
                <p>
                    <?= $item['text'] ?>
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php
                    foreach ($item['treeview'] as $value){
                        $link_active = null;
                        if (getURLActual() == route($value['route'])){
                            $link_active = 'active';
                        }
                        if (\app\Providers\Auth::validatePermissions($value['route'])){
                ?>
                        <li class="nav-item">
                            <a href="<?= route($value['route']) ?>" class="nav-link <?= $link_active ?>">
                                <i class="nav-icon <?= $value['icon'] ?>"></i>
                                <p><?= $value['text'] ?></p>
                            </a>
                        </li>
                <?php
                        }
                    }
                ?>
            </ul>
        </li>
<?php
        }
    } else {
        $link_active = null;
        if (getURLActual() == route($item['route'])){
            $link_active = 'active';
        }
        if (\app\Providers\Auth::validatePermissions($item['route'])){
?>
        <li class="nav-item">
            <a href="<?= route($item['route']) ?>" class="nav-link <?= $link_active ?>">
                <i class="nav-icon <?= $item['icon'] ?>"></i>
                <p><?= $item['text'] ?></p>
            </a>
        </li>
<?php
        }
    }
}

?>

<!--<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon bi bi-palette"></i>
        <p>Level 1</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon bi bi-speedometer"></i>
        <p>
            Level 1
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Level 2</p>
            </a>
        </li>
    </ul>
</li>-->

