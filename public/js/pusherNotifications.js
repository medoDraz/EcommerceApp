var notificationsWrapper = $('.dropdown-notification');
	var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
	var notificationsCountElem = notificationsToggle.find('span[data-count]');
	var notificationsCount = parseInt(notificationsCountElem.data('count'));
	var notifications = notificationsWrapper.find('li.scrollable-container');

	// Subscribe to the channel we specified in our Laravel Event
	var channel = pusher.subscribe('notefication');
	// Bind a function to a Event (the full Laravel class)
	channel.bind('App\\Events\\MessageDelivered', function (data) {
		console.log('asdsd');
		var existingNotifications = notifications.html();
		var newNotificationHtml = '<a href="javascript:void(0)"><div class="media"><div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div><div class="media-body"><h6 class="media-heading">'+ data.user_name +'</h6><p class="notification-text font-small-3 text-muted">'+ data.comment +'</p><small><time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">'+ data.date + data.time +' </time></small></div></div></a>';
		notifications.html(newNotificationHtml + existingNotifications);
		notificationsCount += 1;
		notificationsCountElem.attr('data-count', notificationsCount);
		notificationsWrapper.find('.notif-count').text(notificationsCount);
		notificationsWrapper.show();
	});