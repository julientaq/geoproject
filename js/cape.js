var pluginName = 'gpLeafletMap';

var token = my_options.token;
var style = my_options.style;
if (style == "") {
    style = 'mapbox/streets-v11';
}
var defaultExportMapHeight = my_options.defaultExportMapHeight; 

var tilesProviders = {
        osm: {
            providerName: 'osm',
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution: '<a href="https://openstreetmap.org">OpenStreetMap</a>',
            maxZoom: 18
        },
        cyclosm: {
            providerName: 'osm',
            url: 'https://dev.{s}.tile.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png',
            attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 20
        },
        esrigrey: {
            providerName: 'esri',
            url: 'https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}',
            attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ',
            maxZoom: 16
        },
        esristreet: {
            providerName: 'esri',
            url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}',
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, Delorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012',
            maxZoom: 18
        },
        esriworld: {
            providerName: 'esri',
            url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>, Tiles courtesy of <a href="https://hot.openstreetmap.org/" target="_blank">Humanitarian OpenStreetMap Team</a>',
            maxZoom: 18
        },
        osmhot: {
            providerName: 'osm',
            url: 'https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png',
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
            maxZoom: 18
        },
        hydda: {
            providerName: 'osm',
            url: 'https://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png',
            attribution: 'Tiles courtesy of <a href="https://openstreetmap.se/" target="_blank">OpenStreetMap Sweden</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        },
        opentopo: { 
            providerName: 'osm',
            url: 'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',
            attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
            maxZoom: 18
        },
        worldimagery: {
            providerName: 'arcgis',
            url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Shaded_Relief/MapServer/tile/{z}/{y}/{x}',
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri',
            maxZoom: 13
        },
        delorme: {
            providerName: 'esri',
            url: 'https://server.arcgisonline.com/ArcGIS/rest/services/Specialty/DeLorme_World_Base_Map/MapServer/tile/{z}/{y}/{x}',
            attribution: 'Tiles &copy; Esri &mdash; Copyright: &copy;2012 Delorme',
            maxZoom: 11
        },
        stadia_alida: {
            providerName: 'stadia',
            url: 'https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png',
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 20
        },
        stadia_osmbright: {
            providerName: 'stadia',
            url: 'https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png',
            maxZoom: 20,
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        },
        stadia_outdoors: {
            providerName: 'stadia',
            url: 'https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png',
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 20
        },
        stadia_dark: {
            providerName: 'stadia',
            url: 'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png',
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 20
        },
        mtmap: {
            providerName: 'mtmap',
            url: 'https://tile.mtbmap.cz/mtbmap_tiles/{z}/{x}/{y}.png',
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &amp; USGS',
        },
        stamentoner: {
            providerName: 'stamen',
            url: 'https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.png',
            attribution: 'Map tiles by <a href="https://stamen.com">Stamen Design</a>, <a href="https://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 20,
            ext: 'png'
        },
        stamentonerlight: {
            providerName: 'stamen',
            url: 'https://stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}{r}.png',
            attribution: 'Map tiles by <a href="https://stamen.com">Stamen Design</a>, <a href="https://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 20,
            ext: 'png'
        },
        stamenwater: {
            providerName: 'stamen',
            url: 'https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.png',
            attribution: 'Map tiles by <a href="https://stamen.com">Stamen Design</a>, <a href="https://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 20,
            ext: 'png'
        },
        stamenterrain: {
            providerName: 'stamen',
            url: 'https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.png',
            attribution: 'Map tiles by <a href="https://stamen.com">Stamen Design</a>, <a href="https://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 20,
            ext: 'png'
        },
        geoportail: {
            providerName: 'geoportail',
            url: 'https://wxs.ign.fr/choisirgeoportail/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE=normal&TILEMATRIXSET=PM&FORMAT=image/jpeg&LAYER=GEOGRAPHICALGRIDSYSTEMS.MAPS.SCAN-EXPRESS.STANDARD&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}',
            attribution: '<a target="_blank" href="https://www.geoportail.gouv.fr/">Geoportail France</a>',
            bounds: [[-75, -180], [81, 180]],
            minZoom: 2,
            maxZoom: 18,
            apikey: 'choisirgeoportail',
            format: 'image/jpeg',
            style: 'normal'
        },
        geoportailimg: {
            providerName: 'geoportail',
            url: 'https://wxs.ign.fr/choisirgeoportail/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE=normal&TILEMATRIXSET=PM&FORMAT=image/jpeg&LAYER=GEOGRAPHICALGRIDSYSTEMS.MAPS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}',
            attribution: '<a target="_blank" href="https://www.geoportail.gouv.fr/">Geoportail France</a>',
            bounds: [[-75, -180], [81, 180]],
            minZoom: 2,
            maxZoom: 18,
            apikey: 'choisirgeoportail',
            format: 'image/jpeg',
            style: 'normal'
        },
        geoportailorthos: {
            providerName: 'geoportail',
            url: 'https://wxs.ign.fr/choisirgeoportail/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE=normal&TILEMATRIXSET=PM&FORMAT=image/jpeg&LAYER=ORTHOIMAGERY.ORTHOPHOTOS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}',
            bounds: [[-75, -180], [81, 180]],
            minZoom: 2,
            maxZoom: 18,
            apikey: 'choisirgeoportail',
            format: 'image/jpeg',
            style: 'normal'
        },
        mapbox: {
            providerName: 'mapbox',
            url: 'https://api.mapbox.com/styles/v1/' + style + '/tiles/{z}/{x}/{y}?access_token=' + token,
            attribution: '© <a href="https://apps.mapbox.com/feedback/">Mapbox</a> © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 15,
            tileSize: 512,
            zoomOffset: -1
        }
    };

