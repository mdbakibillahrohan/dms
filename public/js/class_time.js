

$(document).ready(function () {
    let add_class_time = document.getElementById('add_class_time')
    add_class_time.addEventListener("click", () => {
        let subject = document.getElementById('subject');
        let class_room = document.getElementById('class_room');
        let day = document.getElementById('day');
        let from = document.getElementById('from');
        let to = document.getElementById('to');
        $.ajax({
            url: '/class/time/routine-details',
            type: "GET",
            contentType: "json;",
            data: {

                subject_id: subject.value,
                class_room_id: class_room.value,
                day_id: day.value,

            },
            success: function (data) {
                day = document.getElementById(data.day.day_name);
                fromHourTime = from.value[0] + from.value[1];
                toHourTime = to.value[0] + to.value[1];
                fromMinuteTime = from.value[3] + from.value[4];
                toMinuteTime = to.value[3] + to.value[4];
                distanceMinute = toMinuteTime - fromMinuteTime;
                distanceHour = toHourTime - fromHourTime;
                if (distanceMinute < 0) {
                    distanceHour = distanceHour - 1;
                    distanceMinute = 60 + distanceMinute;
                }
                let fullClassDuration = distanceHour * 60 + distanceMinute;
                console.log("full class duration is " + fullClassDuration)
                period = fullClassDuration / 45;

                let pre = fromHourTime - 8;

                let preFromTimeMinutes = pre * 60 + parseInt(fromMinuteTime);
                let prePeriod = preFromTimeMinutes / 45;

                // for (let a = 1; a <= prePeriod; a++) {
                //     day.innerHTML += `<td></td>`;
                // }

                // day.innerHTML += `<td colspan="${period}">${data.subject.name} <br> ${data.classRoom.class_room_no} </td>`;








                // here started new code
                let tags = day.innerHTML.split('<td>');
                let newTags = "";
                let colSpan = period;

                for (let a = 1; a < tags.length; a++) {
                    // console.log(`Comparing pre period and a, a is ${a} and preperid is ${prePeriod} tags length is ${tags.length}`)

                    if (a == prePeriod + 2) {
                        for (let b = prePeriod + 2; b < prePeriod + 2 + colSpan; b++) {
                            if (a == prePeriod + 2) {
                                newTags = newTags + `<td colspan="${colSpan}" >Principles of software engineering <br> 411</td>`;
                                a++;
                            }
                        }
                    } else {
                        newTags = newTags + "<td>" + tags[a];
                    }
                }
                day.innerHTML = newTags;

            }

        })

    })

})


function clickMe() {
    let day = document.getElementById("Saturday");
    let tags = day.innerHTML.split('<td>');
    let newTags = "";
    let colSpan = 1;

    for (let a = 1; a < tags.length; a++) {

        if (a == 2) {
            for (let b = 2; b < 2 + colSpan; b++) {
                if (a == 2) {
                    newTags = newTags + `<td colspan="${colSpan}" >Principles of software engineering <br> 411</td>`;
                    a++;
                }
            }
        } else {
            newTags = newTags + "<td>" + tags[a];
        }
    }
    day.innerHTML = newTags;
}
