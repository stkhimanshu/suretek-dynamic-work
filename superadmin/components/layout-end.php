</div>

</main>

<script src="<?= ADMIN_PATH ?>/assets/js/app.js"></script>
<script>
    const STORAGE_KEY = 'sidebar_open_menus';

    /*
    |--------------------------------------------------------------------------
    | Get Saved Menus
    |--------------------------------------------------------------------------
    */
    function getOpenMenus() {

        try {
            return JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
        } catch (e) {
            return [];
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Save Menus
    |--------------------------------------------------------------------------
    */
    function saveOpenMenus(menus) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(menus));
    }

    /*
    |--------------------------------------------------------------------------
    | Restore Open Menus
    |--------------------------------------------------------------------------
    */
    const openMenus = getOpenMenus();

    openMenus.forEach(targetId => {

        const submenu = document.getElementById(targetId);

        if (!submenu) return;

        submenu.classList.remove('hidden');

        const button = document.querySelector(
            `[data-target="${targetId}"]`
        );

        if (!button) return;

        const icon = button.querySelector(
            '.material-symbols-outlined'
        );

        if (icon) {
            icon.textContent = 'remove';
        }

    });

    /*
    |--------------------------------------------------------------------------
    | Toggle Menus
    |--------------------------------------------------------------------------
    */
    document.querySelectorAll('.submenu-toggle').forEach(button => {

        button.addEventListener('click', function(e) {

            e.preventDefault();
            e.stopPropagation();

            const targetId = this.dataset.target;

            const submenu = document.getElementById(targetId);

            if (!submenu) return;

            submenu.classList.toggle('hidden');

            const icon = this.querySelector(
                '.material-symbols-outlined'
            );

            const isHidden = submenu.classList.contains('hidden');

            if (icon) {
                icon.textContent = isHidden ?
                    'add' :
                    'remove';
            }

            /*
            |--------------------------------------------------------------------------
            | Persist State
            |--------------------------------------------------------------------------
            */
            let menus = getOpenMenus();

            if (!isHidden) {

                if (!menus.includes(targetId)) {
                    menus.push(targetId);
                }

            } else {

                menus = menus.filter(id => id !== targetId);

            }

            saveOpenMenus(menus);

        });

    });
</script>

</body>

</html>