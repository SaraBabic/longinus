(function (Drupal, $, once) {
  Drupal.behaviors.cheeseburgermenuMain = {
    attach: function (context) {
      const TRIGGER = "data-cheeseburger-id";
      const MENU_TRIGGER = `.block-cheeseburgermenu__trigger-element, .block-cheeseburgermenu__trigger-element span`;
      const BACKDROP = ".cheeseburger-menu__backdrop";
      const BACKDROP_ACTIVE = `${BACKDROP}--active`;
      const BODY_ACTIVE = "body--has-active-cheese";
      const CHEESEBURGER_SIDEMENU = ".cheeseburger-menu__side-menu";
      const CHEESEBURGER_MAINMENU = ".cheeseburger-menu__main-navigation-area";
      const SIDE_TRIGGER = `${CHEESEBURGER_SIDEMENU} [${TRIGGER}]`;
      const MENU_CLOSE = "[data-cheeseburger-close]";
      const PARENT_TRIGGER = "[data-cheeseburger-parent-trigger]";
      const DEFAULT_EXPAND = "[data-cheeseburger-default-expand]";
      const CHEESE_HIGHLIGHTED = ".highlighted";
      const CHEESEBURGER = ".block-cheeseburgermenu-container";
      const CHEESEBURGER_ACTIVE = `${CHEESEBURGER}--is-open`;
      const CHEESEBURGER_MENU_ITEM = ".cheeseburger-menu__item";
      const CHEESEBURGER_MENU_ITEM_ACTIVE = `${CHEESEBURGER_MENU_ITEM}--is-expanded`;
      const CHEESEBURGER_PARENT = ".cheeseburger-parent";
      const COLLAPSIBLE_TITLE = ".cheeseburger-menu__title--collapsible";
      const EXPANDED_TITLE = ".cheeseburger-menu__title--expanded";
      const MENU_VISIBLE = "cheeseburger-menu__mainmenu--visible";
      const MENU_INVISIBLE = "cheeseburger-menu__mainmenu--invisible";
      const MAIN_MENU = ".cheeseburger-menu__mainmenu";
      const CHEESEBURGER_ONCE_IDENTIFIER = 'cheeseburger'

      const ANIMATION_SPEED = 300;

      $(once(CHEESEBURGER_ONCE_IDENTIFIER, MENU_TRIGGER, context))
        .each(function () {
          $(this).on("click", handleTriggerClick);
        });

      $(once(CHEESEBURGER_ONCE_IDENTIFIER, MENU_CLOSE, context))
        .each(function () {
          $(this).on("click", handleCloseClick);
        });

      $(once(CHEESEBURGER_ONCE_IDENTIFIER, PARENT_TRIGGER, context))
        .each(function () {
          $(this).on("click", handleParentTriggerClick);
        });

      $(once(`${CHEESEBURGER_ONCE_IDENTIFIER}-mouse`, SIDE_TRIGGER, context))
        .each(function () {
          $(this).on("mousedown", handleSideTriggerClick);
          $(this).on("mouseup", handleSideTriggerMouseUp);
        });

      (once(`${CHEESEBURGER_ONCE_IDENTIFIER}-touch`, SIDE_TRIGGER, context))
        .forEach((el) => {
          $(el).on("touchstart", handleSideTriggerClick);
          $(el).on("touchend", handleSideTriggerMouseUp);
        });

      $(once(CHEESEBURGER_ONCE_IDENTIFIER, CHEESEBURGER, context))
        .each(function () {
          $(this).on("scroll", throttle(handleCheeseScroll, 50));
          $(this).on("scroll", debounce(handleCheeseScroll, 10));
        });

      $(once(CHEESEBURGER_ONCE_IDENTIFIER, COLLAPSIBLE_TITLE, context))
        .each(function () {
          $(this).children(MAIN_MENU).addClass(MENU_INVISIBLE);
          $(this)
            .children(".cheeseburger-menu__title")
            .on("click", handleTitleTriggerClick);
        });

      $(once(CHEESEBURGER_ONCE_IDENTIFIER, EXPANDED_TITLE, context))
        .each(function () {
          $(this)
            .children(MAIN_MENU)
            .addClass(MENU_VISIBLE)
            .removeClass(MENU_INVISIBLE);
        });

      $(once(`${CHEESEBURGER_ONCE_IDENTIFIER}--miscclick`, "body")).on("click", handleMiscClick);

      $(once(`${CHEESEBURGER_ONCE_IDENTIFIER}--escape`, 'html')).on("keydown", function (e) {
        if (e.key === "Escape") {
          handleCloseClick(e);
        }
      });

      $(document).ready(function () {
        injectBackdrop();
        openParents();
      });

      function throttle(func, timeFrame) {
        let lastTime = 0;
        return function (...args) {
          const now = new Date();
          if (now - lastTime >= timeFrame) {
            func(...args);
            lastTime = now;
          }
        };
      }

      function debounce(func, wait, immediate) {
        let timeout;
        return function() {
          const context = this, args = arguments;
          clearTimeout(timeout);
          timeout = setTimeout(function() {
            timeout = null;
            if (!immediate) {
              func.apply(context, args);
            }
          }, wait);
          if (immediate && !timeout) {
            func.apply(context, args);
          }
        };
      }

      function openParents() {
        $(CHEESEBURGER_PARENT).each(function () {
          if ($(this).hasClass("in-active-trail")) {
            $(this).addClass("cheeseburger-menu__item--is-expanded");
          }
        });
      }

      function injectBackdrop() {
        if ($(BACKDROP).length === 0) {
          const backdrop = document.createElement("div");
          backdrop.setAttribute("class", BACKDROP.replace(".", ""));

          $(once(`${CHEESEBURGER_ONCE_IDENTIFIER}--backdrop`, "body"))
            .prepend(backdrop);
        }
      }

      function handleTriggerClick(e) {
        e.preventDefault();
        e.stopPropagation();

        const id =
          $(e.target).attr(TRIGGER) || $(e.target).parent().attr(TRIGGER);
        if ($(`#${id}`).attr("style")) {
          $(`#${id}`).removeAttr("style");
          setTimeout(function () {
            $(`#${id}`).toggleClass(CHEESEBURGER_ACTIVE.replace(".", ""));
            $(BACKDROP).toggleClass(BACKDROP_ACTIVE.replace(".", ""));
            $("body").toggleClass(BODY_ACTIVE.replace(".", ""));
          }, 1);
        } else {
          $(`#${id}`).toggleClass(CHEESEBURGER_ACTIVE.replace(".", ""));
          $(BACKDROP).toggleClass(BACKDROP_ACTIVE.replace(".", ""));
          $("body").toggleClass(BODY_ACTIVE.replace(".", ""));
        }
      }

      function handleCloseClick(e) {
        e.preventDefault();
        e.stopPropagation();
        $(CHEESEBURGER_ACTIVE)
          .eq(0)
          .removeClass(CHEESEBURGER_ACTIVE.replace(".", ""));
        $(BACKDROP).removeClass(BACKDROP_ACTIVE.replace(".", ""));
        $("body").removeClass(BODY_ACTIVE.replace(".", ""));
      }

      function handleParentTriggerClick(e) {
        e.preventDefault();
        e.stopPropagation();

        const $parentItem = $(e.target).parents(CHEESEBURGER_MENU_ITEM).eq(0);

        if (
          $parentItem.hasClass(CHEESEBURGER_MENU_ITEM_ACTIVE.replace(".", ""))
        ) {
          // Toggle already opened submenu.
          $.each($parentItem.children("ul"), function () {
            animateToHeightAndClearStyle(
              $(this),
              0,
              $parentItem.children("ul").length
            );
          });

          setTimeout(function () {
            $parentItem.removeClass(
              CHEESEBURGER_MENU_ITEM_ACTIVE.replace(".", "")
            );
          }, ANIMATION_SPEED * 0.8);
        } else {
          // Open selected submenu and close sibling submenus.
          $parentItem.addClass(CHEESEBURGER_MENU_ITEM_ACTIVE.replace(".", ""));

          $.each(
            $parentItem
              .parents("ul")
              .eq(0)
              .siblings("ul")
              .find("> li" + CHEESEBURGER_MENU_ITEM_ACTIVE),
            function () {
              $.each($(this).children("ul"), function () {
                animateToHeightAndClearStyle(
                  $(this),
                  0,
                  $(this).children("ul").length
                );
              });
            }
          );

          $.each(
            $parentItem.siblings(CHEESEBURGER_MENU_ITEM).not(DEFAULT_EXPAND),
            function () {
              $.each($(this).children("ul"), function () {
                animateToHeightAndClearStyle(
                  $(this),
                  0,
                  $(this).children("ul").length
                );
              });

              $(this).removeClass(
                CHEESEBURGER_MENU_ITEM_ACTIVE.replace(".", "")
              );
            }
          );

          $parentItem
            .parents("ul")
            .siblings("ul")
            .find(`> ${CHEESEBURGER_MENU_ITEM}`)
            .removeClass(CHEESEBURGER_MENU_ITEM_ACTIVE.replace(".", ""));

          // Animation.
          $.each($parentItem.children("ul"), function () {
            $(this).css({ height: "auto" });
            const height = $(this).height();
            $(this).css({ height: 0 });
            animateToHeightAndClearStyle(
              $(this),
              height,
              $parentItem.children("ul").length
            );
          });
        }
      }

      function animateToHeightAndClearStyle($el, height, coeficient) {
        let variation = 1;

        // Make longer menus animate slower.
        if (coeficient > 15) {
          variation += coeficient * 0.04;
        }

        $el.animate(
          { height: height },
          ANIMATION_SPEED * variation,
          function () {
            $(this).removeAttr("style");
          }
        );
      }

      function handleMiscClick(e) {
        if ($(e.target).parents(CHEESEBURGER_ACTIVE).length === 0) {
          $(CHEESEBURGER_ACTIVE).each(function () {
            $(this).removeClass(CHEESEBURGER_ACTIVE.replace(".", ""));
            $(this)
              .find(CHEESE_HIGHLIGHTED)
              .removeClass(CHEESE_HIGHLIGHTED.replace(".", ""));
            $(BACKDROP).removeClass(BACKDROP_ACTIVE.replace(".", ""));
            $("body").removeClass(BODY_ACTIVE.replace(".", ""));
          });
        }
      }

      function handleSideTriggerClick(e) {
        e.preventDefault();
        e.stopPropagation();

        const $targetId =
          $(e.target).attr(TRIGGER) ||
          $(e.target).parents(SIDE_TRIGGER).attr(TRIGGER);
        const $target = $(e.target)
          .parents(CHEESEBURGER)
          .find(CHEESEBURGER_MAINMENU)
          .find(`[${TRIGGER}=${$targetId}]`);
        $target.addClass(CHEESE_HIGHLIGHTED.replace(".", ""));
        const $offsetTopFromMainArea = $target.position().top;
        const $currentlyScrolled = $(e.target)
          .parents(CHEESEBURGER)
          .find(CHEESEBURGER_MAINMENU)
          .scrollTop();

        $(e.target)
          .parents(CHEESEBURGER)
          .eq(0)
          .find(CHEESEBURGER_MAINMENU)
          .animate(
            { scrollTop: $offsetTopFromMainArea + $currentlyScrolled },
            300
          );
      }

      function handleTitleTriggerClick(e) {
        e.preventDefault();
        e.stopPropagation();

        $(this)
          .parents(COLLAPSIBLE_TITLE)
          .toggleClass(EXPANDED_TITLE.replace(".", ""));

        $(this)
          .parents(COLLAPSIBLE_TITLE)
          .children(MAIN_MENU)
          .toggleClass(MENU_INVISIBLE)
          .toggleClass(MENU_VISIBLE);
      }

      function handleSideTriggerMouseUp(e) {
        const $targetId =
          $(e.target).attr(TRIGGER) ||
          $(e.target).parents(SIDE_TRIGGER).attr(TRIGGER);
        const $target = $(e.target)
          .parents(CHEESEBURGER)
          .find(CHEESEBURGER_MAINMENU)
          .find(`[${TRIGGER}=${$targetId}]`);
        $target.removeClass(CHEESE_HIGHLIGHTED.replace(".", ""));
      }

      function handleCheeseScroll() {
        const $scrollTop = $(CHEESEBURGER).scrollTop();
        $(CHEESEBURGER).find(CHEESEBURGER_SIDEMENU).css({ top: $scrollTop });
      }
    },
  };
})(Drupal, jQuery, once);
