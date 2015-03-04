$(document).ready(function() {

	var feed = new Instafeed({
			get: 'tagged',
			tagName: 'pitbulllove',
			clientId: 'ad19ab7ad8e940a5a8ee3775ac7553ff',
			template: '<img src={{image}}>'
		});
	feed.run();
});