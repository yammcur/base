var yammerHelper = {
    checkLoginStatus: function (callback) {
        yam.getLoginStatus(function (response) {
            if (response.authResponse) {
                callback();
            }
            else {
                yammerHelper.login(callback);
            }
        });
    },
    logout: function () {
        yam.logout(function (response) { });
    },
    praiseUser: function (id, text){
        var message = {
            "comment":text,
            "icon":"money",
            "praised_user_ids":[id]
        };

        yam.request({
            url: "https://api.yammer.com/api/v1/messages.json",
            method: "POST",
            data: {
                "praise" : JSON.stringify(message)
            },
            success: function (msg) {
                alert("Message Posted Successfully");
            },
            error: function (msg) {
                alert("Message Posting Error: " + msg);
            }
        });
    },
    postToActivityFeed: function () {
        var testFeed = {
            "activity": {
                "actor": { "name": "Goran Stoyanov", "email": "goran@devlabs.bg" },
                "action": "create",
                "object": {
                    "url": location.href
                },
                "private": "false",
                "message": "Az sym aktiviti fiida we."
            }
        };

        yam.request({
            url: "https://api.yammer.com/api/v1/activity.json",
            method: "POST",
            data: testFeed,
            success: function (msg) {
                alert("Activity Feed Posted Successfully");
            },
            error: function (msg) {
                alert("Activity Feed Posting Error: " + msg);
            }
        });
    },
    postAMessage: function () {
        var testMessage = {
            "body": "Hey ! have you seen this link: " + location.href
        };

        yam.request({
            url: "https://api.yammer.com/api/v1/messages.json",
            method: "POST",
            data: testMessage,
            success: function (msg) {
                alert("Message Posted Successfully");
            },
            error: function (msg) {
                alert("Message Posting Error: " + msg);
            }
        });
    },
    login: function (callback) {
        yam.login(function (response) {
            if (response.authResponse) {
                callback();
            }
            else {
                alert(response.authResponse);
            }
        });
    },
    loginAndPostMessage: function () {
        yammerHelper.checkLoginStatus(function () {
            yammerHelper.postAMessage();
        });
    },
    getUsersInNetwork: function() {
        yam.request({
            url: "https://api.yammer.com/api/v1/users.json",
            method: "GET",
            data: {
            },
            success: function (users) {
              $.each(users,function(index, user){
                    $("#ymr_users").append('<div class="input-group margin-top20"><span class="input-group-addon"><input type="hidden" name="dummy[]" value="'+user.id+'" /><input type="hidden" name="id[]" value="'+user.id+'" /><input type="hidden" name="email[]" value="'+user.contact.email_addresses[0].address+'" /><input name="active['+user.id+']" value="1" type="checkbox"></span><input type="text" value="'+user.contact.email_addresses[0].address+'" disabled class="form-control"></div>');
              });
            },
            error: function (user) {
              alert("There was an error with the request.");
            }
        });
    }
}