var People = function () {};
People.instantiate = function (classname) {
	if (classname == 'taro') {
		var PersonClass = new Taro;
	} else if (classname == 'hanako') {
		var PersonClass = new Hanako;
	} else if (classname == 'shotaro') {
		var PersonClass = new Shotaro;
	} else {
		alert ('error');
	}
	return PersonClass;
};
var Taro = function () {};
Taro.prototype = new People();
Taro.prototype.selfAppoint = function () {
	this.name = '太郎';
	this.sex = '男';
	this.greeting = '俺はたろう';
	alert(this.name);
	alert(this.sex);
	alert(this.greeting);
};
var Hanako = function () {};
Hanako.prototype = new People();
Hanako.prototype.selfAppoint = function () {
	this.name = '花子';
	this.sex = '女';
	this.greeting = '私は花子';
	alert(this.name);
	alert(this.sex);
	alert(this.greeting);
};
var Shotaro = function () {};
Shotaro.prototype = new People();
Shotaro.prototype.selfAppoint = function () {
	this.name = '正太郎';
	this.sex = '女';
	this.greeting = '実は女だ';
	alert(this.name);
	alert(this.sex);
	alert(this.greeting);
};
var people = new Array("taro", "hanako", "shotaro");
console.log(dumpJson(people, {indent:true}));
for (var i = 0; i < people.length; i++) {
	var person = People.instantiate(people[i]);
	person.selfAppoint();
}
//jsでfactory method
