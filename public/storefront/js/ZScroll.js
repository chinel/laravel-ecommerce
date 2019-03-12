$.fn.extend({
	ZScroll: function(options = {}){
		return $(this).each(function(){
			// Variables
			HoveringDraggingBar = false;
			DraggingBar = false;
			DraggingBarOffset = 0;
			ScrollPercentage = 0;

			// Default options
			Options = {
				ScrollZoneColor:"#DDDDDD",
				ScrollBarColor:"orange",
				ScrollBarWidth:5,
				ScrollBarHeight:null,
				ScrollBarMinHeight:10,
				ScrollBarPadding:10,
				ScrollBarRadius:10,
				ScrollBarUnusedCSS:{"opacity":0.5},
				ScrollBarInUseCSS:{"opacity":1},
				ScrollBarOpacityEasing:300,
				ScrollWheelDistance:50,
				Active:"auto",
				Display:true
			};

			// Apply custom options
			for(var key in options)
				Options[key] = options[key];

			// Do not apply if not needed
			if(!Options.Active || (Options.Active == "auto" && $(this).prop("scrollHeight") <= $(this).height() + 1))
				return;

			// Setup
			$(this).css({"position":"relative", "overflow":"hidden"});
			$(this).css({"width":$(this).width() - (Options.ScrollBarWidth + Options.ScrollBarPadding), "padding-right":Options.ScrollBarWidth + Options.ScrollBarPadding});
			$(this).scrollTop(ScrollPercentage * $(this).height());

			// ScrollZone
				ScrollZone = $("<div class='ScrollZone'></div>");
				ScrollZone.css({"position":"absolute", "right":0, "top":0, "width":Options.ScrollBarWidth, "height":"100%", "background":Options.ScrollZoneColor, "border-radius":Options.ScrollBarRadius});

				ScrollZone.mousedown(function(e){
					DraggingBar = $(this).next(".ScrollBar");
					DraggingBarOffset = DraggingBar.parent().offset().top + (DraggingBar.height() / 2);
					DraggingBar.css({"opacity":"1"});
					RePosition(e);
				});

				$(this).append(ScrollZone);

			// ScrollBar
				ScrollBar = $("<div class='ScrollBar'></div>");
				ScrollBar.css(Options.ScrollBarUnusedCSS);
				ScrollBar.css({"position":"absolute", "right":0, "top":0, "width":Options.ScrollBarWidth, "min-height":Options.ScrollBarMinHeight, "background":Options.ScrollBarColor, "border-radius":Options.ScrollBarRadius});

				if(Options.ScrollBarHeight == null)
				{
					ScrollBar.css({"height":($(this).height() / $(this).prop("scrollHeight")) * $(this).height()});
				}
				else
					ScrollBar.css({"height":Options.ScrollBarHeight});

				ScrollBar.mousedown(function(e){
					DraggingBar = $(this);
					DraggingBarOffset = DraggingBar.parent().offset().top + (e.pageY - DraggingBar.offset().top);
					DraggingBar.stop().animate(Options.ScrollBarInUseCSS, Options.ScrollBarOpacityEasing);
				});
				ScrollBar.mouseover(function(){
					if(!DraggingBar && !HoveringDraggingBar)
					{
						HoveringDraggingBar = true;
						$(this).stop().animate(Options.ScrollBarInUseCSS, Options.ScrollBarOpacityEasing);
					}
				});
				ScrollBar.mouseleave(function(){
					HoveringDraggingBar = false;

					if(!DraggingBar)
						$(this).stop().animate(Options.ScrollBarUnusedCSS, Options.ScrollBarOpacityEasing);
				});

				$(this).append(ScrollBar);

			// Hide if display off
			if(!Options.Display)
			{
				ScrollBar.hide();
				ScrollZone.hide();
			}

			// Events
			$(document).mousemove(function(e){
				return RePosition(e);
			});

			$(document).mouseup(function(){
				if(DraggingBar && !HoveringDraggingBar)
				{
					DraggingBar.stop().animate(Options.ScrollBarUnusedCSS, Options.ScrollBarOpacityEasing);
					DraggingBar = false;
					return false;
				}

				DraggingBar = false;
			});

			$(this).bind('mousewheel', function(e){
				if(e.originalEvent.wheelDelta < 0)
					$(this).scrollTop($(this).scrollTop() + Options.ScrollWheelDistance);
				else
					$(this).scrollTop($(this).scrollTop() - Options.ScrollWheelDistance);

				ScrollPercentage = ($(this).scrollTop() / ($(this).prop("scrollHeight") - $(this).height()));
				$(this).find(".ScrollBar").css({"top":$(this).scrollTop() + (ScrollPercentage * ($(this).height() - $(this).find(".ScrollBar").height()))});
				$(this).find(".ScrollZone").css({"top":$(this).scrollTop()});

				return false;
			});

			function RePosition(e){
				if(!DraggingBar) return;

				newPosY = e.pageY - DraggingBarOffset;
				if(newPosY < 0) newPosY = 0;
				else if(newPosY > DraggingBar.parent().height() - DraggingBar.height()) newPosY = DraggingBar.parent().height() - DraggingBar.height();

				ScrollPercentage = newPosY / (DraggingBar.parent().height() - DraggingBar.height());
				DraggingBar.parent().scrollTop(ScrollPercentage * (DraggingBar.parent().prop("scrollHeight") - DraggingBar.parent().height()));
				DraggingBar.css({"top":DraggingBar.parent().scrollTop() + newPosY});
				DraggingBar.prev(".ScrollZone").css({"top":DraggingBar.parent().scrollTop()});

				return false;
			}
		});
	}
});