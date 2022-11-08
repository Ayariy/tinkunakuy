(function (params) {
    document.addEventListener("DOMContentLoaded", function () {
        // if (window.location.pathname.includes("/administrador")) {
        eventCustomizeAdmin();
        // console.log(transRightbar);
        // }
    });

    //FUNCIONES PARA ADMINISTRADOR----------------------------------------------------
    function eventCustomizeAdmin() {
        //Obtener la variable del menu lateral izquierdo o sidebar
        var $sidebar = $(".control-sidebar");
        var $container = $("<div />", {
            class: "p-3 control-sidebar-content",
        });
        $sidebar.append($container);

        //Código para gesionar el modo oscuro o dark-mode

        var adminconfig = localStorage.getItem("admin-config")
            ? JSON.parse(localStorage.getItem("admin-config"))
            : {};

        if (adminconfig.isDarkmode) {
            if (adminconfig.isDarkmode) {
                $("body").addClass("dark-mode");
            } else {
                $("body").removeClass("dark-mode");
            }
        }
        //Checkbox para dark mode
        $container.append(
            "<h5>" +
                transRightbar.rigth_sidebar_title +
                "</h5><hr class='mb-2'/>"
        );
        var $dark_mode_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $("body").hasClass("dark-mode"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $("body").addClass("dark-mode");
                adminconfig.isDarkmode = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $("body").removeClass("dark-mode");
                adminconfig.isDarkmode = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $dark_mode_container = $("<div />", { class: "mb-4" })
            .append($dark_mode_checkbox)
            .append("<span>" + transRightbar.dark_mode + "</span>");
        $container.append($dark_mode_container);

        //Opciones para el encabezado
        //Gesionar la opcion fijar encabezado
        if (adminconfig.fijarNavbar) {
            $("body").addClass("layout-navbar-fixed");
        } else {
            $("body").removeClass("layout-navbar-fixed");
        }

        //Checkbox para fijar encabezado
        $container.append("<h6>" + transRightbar.sidebar_options + "</h6>");
        var $header_fixed_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $("body").hasClass("layout-navbar-fixed"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $("body").addClass("layout-navbar-fixed");
                adminconfig.fijarNavbar = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $("body").removeClass("layout-navbar-fixed");
                adminconfig.fijarNavbar = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $header_fixed_container = $("<div />", { class: "mb-4" })
            .append($header_fixed_checkbox)
            .append("<span>" + transRightbar.sidebar_options + "</span>");
        $container.append($header_fixed_container);

        $("body").addClass("layout-fixed");
        $(window).trigger("resize");
        //Opciones para el slidebar
        $container.append("<h6>Opciones para la barra lateral</h6>");

        //Gestionar slider telefono
        if (adminconfig.miniNavbar) {
            $("body").addClass("sidebar-mini-xs");
        } else {
            $("body").removeClass("sidebar-mini-xs");
        }
        //Checkbox para sidebar telefono
        var $sidebar_mini_xs_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $("body").hasClass("sidebar-mini-xs"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $("body").addClass("sidebar-mini-xs");
                adminconfig.miniNavbar = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $("body").removeClass("sidebar-mini-xs");
                adminconfig.miniNavbar = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $sidebar_mini_xs_container = $("<div />", { class: "mb-1" })
            .append($sidebar_mini_xs_checkbox)
            .append("<span>" + transRightbar.active_min_sidebar + "</span>");
        $container.append($sidebar_mini_xs_container);

        //Gestionar slider navflat
        if (adminconfig.navFlat) {
            $(".nav-sidebar").addClass("nav-flat");
        } else {
            $(".nav-sidebar").removeClass("nav-flat");
        }
        //Checkbox para estylo plano de navegación
        var $flat_sidebar_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $(".nav-sidebar").hasClass("nav-flat"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $(".nav-sidebar").addClass("nav-flat");
                adminconfig.navFlat = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $(".nav-sidebar").removeClass("nav-flat");
                adminconfig.navFlat = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $flat_sidebar_container = $("<div />", { class: "mb-1" })
            .append($flat_sidebar_checkbox)
            .append("<span>" + transRightbar.style_plane_nav + " </span>");
        $container.append($flat_sidebar_container);

        //Gestionar esilo heredado de navegación
        //Gestionar slider telefono
        if (adminconfig.navLegacy) {
            $(".nav-sidebar").addClass("nav-legacy");
        } else {
            $(".nav-sidebar").removeClass("nav-legacy");
        }
        //Checkbox para estilo heredado de navegación
        var $legacy_sidebar_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $(".nav-sidebar").hasClass("nav-legacy"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $(".nav-sidebar").addClass("nav-legacy");
                adminconfig.navLegacy = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $(".nav-sidebar").removeClass("nav-legacy");
                adminconfig.navLegacy = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $legacy_sidebar_container = $("<div />", { class: "mb-1" })
            .append($legacy_sidebar_checkbox)
            .append("<span>" + transRightbar.style_extends_nav + "</span>");
        $container.append($legacy_sidebar_container);

        //Gestionar navegacion compacto
        if (adminconfig.navCompact) {
            $(".nav-sidebar").addClass("nav-compact");
        } else {
            $(".nav-sidebar").removeClass("nav-compact");
        }
        //Checkbox para navegación compacto
        var $compact_sidebar_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $(".nav-sidebar").hasClass("nav-compact"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $(".nav-sidebar").addClass("nav-compact");
                adminconfig.navCompact = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $(".nav-sidebar").removeClass("nav-compact");
                adminconfig.navCompact = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $compact_sidebar_container = $("<div />", { class: "mb-1" })
            .append($compact_sidebar_checkbox)
            .append("<span>" + transRightbar.compact_nav + "</span>");
        $container.append($compact_sidebar_container);

        //Gestionar sangría secundaria
        if (adminconfig.sangriaSecond) {
            $(".nav-sidebar").addClass("nav-child-indent");
        } else {
            $(".nav-sidebar").removeClass("nav-child-indent");
        }
        //Checkbox para sangria secundaria de navegación
        var $child_indent_sidebar_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $(".nav-sidebar").hasClass("nav-child-indent"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $(".nav-sidebar").addClass("nav-child-indent");
                adminconfig.sangriaSecond = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $(".nav-sidebar").removeClass("nav-child-indent");
                adminconfig.sangriaSecond = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $child_indent_sidebar_container = $("<div />", { class: "mb-1" })
            .append($child_indent_sidebar_checkbox)
            .append("<span>" + transRightbar.second_bleeding_nav + "</span>");
        $container.append($child_indent_sidebar_container);

        //Gestionar navegacion secundaria colapsada
        //Gestionar sangría secundaria
        if (adminconfig.colapsadoHide) {
            $(".nav-sidebar").addClass("nav-collapse-hide-child");
        } else {
            $(".nav-sidebar").removeClass("nav-collapse-hide-child");
        }

        //Checkbox para Ocultar navegación secundaria cuando esta collapsado
        var $child_hide_sidebar_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $(".nav-sidebar").hasClass("nav-collapse-hide-child"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $(".nav-sidebar").addClass("nav-collapse-hide-child");
                adminconfig.colapsadoHide = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $(".nav-sidebar").removeClass("nav-collapse-hide-child");
                adminconfig.colapsadoHide = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $child_hide_sidebar_container = $("<div />", { class: "mb-4" })
            .append($child_hide_sidebar_checkbox)
            .append("<span>" + transRightbar.hidden_second_nav + "</span>");
        $container.append($child_hide_sidebar_container);

        //Gestionar footer fijo
        if (adminconfig.footerFijo) {
            $("body").addClass("layout-footer-fixed");
        } else {
            $("body").removeClass("layout-footer-fixed");
        }
        //Checkbox opciones footer
        $container.append("<h6>" + transRightbar.footer_options + "</h6>");
        var $footer_fixed_checkbox = $("<input />", {
            type: "checkbox",
            value: 1,
            checked: $("body").hasClass("layout-footer-fixed"),
            class: "mr-1",
        }).on("click", function () {
            if ($(this).is(":checked")) {
                $("body").addClass("layout-footer-fixed");
                adminconfig.footerFijo = true;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            } else {
                $("body").removeClass("layout-footer-fixed");
                adminconfig.footerFijo = false;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
            }
        });
        var $footer_fixed_container = $("<div />", { class: "mb-4" })
            .append($footer_fixed_checkbox)
            .append("<span>" + transRightbar.fixed + "</span>");
        $container.append($footer_fixed_container);

        // Color Arrays
        var navbar_dark_skins = [
            "navbar-primary",
            "navbar-secondary",
            "navbar-info",
            "navbar-success",
            "navbar-danger",
            "navbar-indigo",
            "navbar-purple",
            "navbar-pink",
            "navbar-navy",
            "navbar-lightblue",
            "navbar-teal",
            "navbar-cyan",
            "navbar-dark",
            "navbar-gray-dark",
            "navbar-gray",
        ];

        var navbar_light_skins = [
            "navbar-light",
            "navbar-warning",
            "navbar-white",
            "navbar-orange",
        ];

        var sidebar_colors = [
            "bg-primary",
            "bg-warning",
            "bg-info",
            "bg-danger",
            "bg-success",
            "bg-indigo",
            "bg-lightblue",
            "bg-navy",
            "bg-purple",
            "bg-fuchsia",
            "bg-pink",
            "bg-maroon",
            "bg-orange",
            "bg-lime",
            "bg-teal",
            "bg-olive",
        ];

        //   var accent_colors = [
        //     "accent-primary",
        //     "accent-warning",
        //     "accent-info",
        //     "accent-danger",
        //     "accent-success",
        //     "accent-indigo",
        //     "accent-lightblue",
        //     "accent-navy",
        //     "accent-purple",
        //     "accent-fuchsia",
        //     "accent-pink",
        //     "accent-maroon",
        //     "accent-orange",
        //     "accent-lime",
        //     "accent-teal",
        //     "accent-olive",
        //   ];

        var sidebar_skins = [
            "sidebar-dark-primary",
            "sidebar-dark-warning",
            "sidebar-dark-info",
            "sidebar-dark-danger",
            "sidebar-dark-success",
            "sidebar-dark-indigo",
            "sidebar-dark-lightblue",
            "sidebar-dark-navy",
            "sidebar-dark-purple",
            "sidebar-dark-fuchsia",
            "sidebar-dark-pink",
            "sidebar-dark-maroon",
            "sidebar-dark-orange",
            "sidebar-dark-lime",
            "sidebar-dark-teal",
            "sidebar-dark-olive",
            "sidebar-light-primary",
            "sidebar-light-warning",
            "sidebar-light-info",
            "sidebar-light-danger",
            "sidebar-light-success",
            "sidebar-light-indigo",
            "sidebar-light-lightblue",
            "sidebar-light-navy",
            "sidebar-light-purple",
            "sidebar-light-fuchsia",
            "sidebar-light-pink",
            "sidebar-light-maroon",
            "sidebar-light-orange",
            "sidebar-light-lime",
            "sidebar-light-teal",
            "sidebar-light-olive",
        ];

        // Navbar Variants

        //Gestionar encabezado color
        if (adminconfig.navbarColor && adminconfig.navbarTheme) {
            var $main_header = $(".main-header");
            $main_header.removeClass("navbar-white");
            $main_header.removeClass("navbar-light");
            $main_header.addClass(adminconfig.navbarColor);
            $main_header.addClass(adminconfig.navbarTheme);
        }

        $container.append("<h6>" + transRightbar.color_headnav + "</h6>");
        var $navbar_variants = $("<div />", {
            class: "d-flex",
        });
        var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins);
        var $navbar_variants_colors = createSkinBlock(
            navbar_all_colors,
            function () {
                var color = $(this).find("option:selected").attr("class");
                var $main_header = $(".main-header");
                $main_header
                    .removeClass("navbar-dark")
                    .removeClass("navbar-light");
                navbar_all_colors.forEach(function (color) {
                    $main_header.removeClass(color);
                });
                color = color.replace("bg-", "navbar-");

                $(this)
                    .removeClass()
                    .addClass("custom-select mb-3 text-light border-0 ");

                if (navbar_dark_skins.indexOf(color) > -1) {
                    $main_header.addClass("navbar-dark");
                    $(this).addClass(color).addClass("text-light");
                    adminconfig.navbarTheme = "navbar-dark";
                    localStorage.setItem(
                        "admin-config",
                        JSON.stringify(adminconfig)
                    );
                } else {
                    $main_header.addClass("navbar-light");
                    $(this).addClass(color).addClass("text-dark");
                    adminconfig.navbarTheme = "navbar-light";
                    localStorage.setItem(
                        "admin-config",
                        JSON.stringify(adminconfig)
                    );
                }

                $main_header.addClass(color);
                adminconfig.navbarColor = color;
                localStorage.setItem(
                    "admin-config",
                    JSON.stringify(adminconfig)
                );
                // color = color.replace("navbar-", "bg-");
            }
        );

        var active_navbar_color = null;
        $(".main-header")[0].classList.forEach(function (className) {
            if (
                navbar_all_colors.indexOf(className) > -1 &&
                active_navbar_color === null
            ) {
                active_navbar_color = className.replace("navbar-", "bg-");
            }
        });

        $navbar_variants_colors
            .find("option." + active_navbar_color)
            .prop("selected", true);
        $navbar_variants_colors
            .removeClass()
            .addClass("custom-select mb-3 text-light border-0 ")
            .addClass(active_navbar_color);

        $navbar_variants.append($navbar_variants_colors);
        $container.append($navbar_variants);
    }

    //Función selected colors
    function createSkinBlock(colors, callback, noneSelected) {
        var $block = $("<select /z>", {
            class: noneSelected
                ? "custom-select mb-3 border-0"
                : "custom-select mb-3 text-light border-0 " +
                  colors[0].replace(/accent-|navbar-/, "bg-"),
        });

        if (noneSelected) {
            var $default = $("<option />", {
                text: "None Selected",
            });

            $block.append($default);
        }

        colors.forEach(function (color) {
            var $color = $("<option />", {
                class: (typeof color === "object" ? color.join(" ") : color)
                    .replace("navbar-", "bg-")
                    .replace("accent-", "bg-"),
                text: capitalizeFirstLetter(
                    (typeof color === "object" ? color.join(" ") : color)
                        .replace(/navbar-|accent-|bg-/, "")
                        .replace("-", " ")
                ),
            });

            $block.append($color);
        });
        if (callback) {
            $block.on("change", callback);
        }

        return $block;
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
})();
