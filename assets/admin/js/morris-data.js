$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2020 Q1',
            iphone: 200,
            laptop: 101,
            smathwatch: 50
        }, {
            period: '2020 Q2',
            iphone: 120,
            laptop: 200,
            smathwatch: 30
        }, {
            period: '2020 Q3',
            iphone: 300,
            laptop: 230,
            smathwatch: 50
        }, {
            period: '2020 Q4',
            iphone: 329,
            laptop: 111,
            smathwatch: 101
        }, {
            period: '2021 Q1',
            iphone: 453,
            laptop: 123,
            smathwatch: 43
        }],
        xkey: 'period',
        ykeys: ['iphone', 'laptop', 'smathwatch'],
        labels: ['iPhone', 'laptop', 'smathwatch'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
