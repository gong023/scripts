class Person
    @instance
    private 
    def initialize name,age,gender
        @name   = name
        @age    = age
        @gender = gender
    end

    def self.getInstance name,age,gender
        @instance = self.new(name,age,gender)
    end

    public
    def tellTrueAge
        @age
    end

    public 
    def tellLieAge 
        fake_age = @age - 3
        fake_age > 0 ? fake_age : @age
    end
end

instance = Person.getInstance('taro',21,'male')
p instance.tellTrueAge
p instance.tellLieAge
