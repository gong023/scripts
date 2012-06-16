class Person
    @@instance
    private 
    def initialize name,age,gender
        @name   = name
        @age    = age
        @gender = gender
    end

    def self.getInstance name,age,gender
        @@instance = self.new(name,age,gender)
        return @@instance 
    end

    public 
    def tellLieAge 
        fake_age = @age - 3
        if fake_age > 0
            return fake_age
        else
            return @age
        end
    end
end

instance = Person.getInstance('taro',21,'male')
p instance.tellLieAge
