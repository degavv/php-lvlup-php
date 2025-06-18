let building = {
    street : ' Шевченко',
    city : 'Київ',
    building : 5,
    color : 'жовтий',
    length : 4,
    width : 7,
    floors : 2,
    getArea: function(){
        return this.length * this.width * this.floors;
    },
    toString: function(){
        return 'Будівля за адресою: місто ' + this.city + ' вулиця ' + this.street + ' будинок '+ this.building + ' колір: ' + this.color + ' Загальна площа = ' + this.getArea();
    }
}

alert(building);