class PersonFactory
    def createFactory name
        begin
            return Object.const_get(name).new
        rescue NameError
            return nil
        end
    end
end

class PersonAbstract
    def appointment
        person = {
            'name'   => getName,
            'age'    => getAge,
            'gender' => getGender
        }
        return person
    end

    def getName
        return @name
    end

    def getAge 
        return @age
    end

    def getGender 
        return @gender
    end
end

class Taro < PersonAbstract
    def initialize
        @name   = 'taro'
        @age    = 21
        @gender = 'male'
    end
end

class Hanako < PersonAbstract
    def initialize
        @name   = 'hanako'
        @age    = 20
        @gender = 'female'
    end
end

class John < PersonAbstract
    def initialize
        @name   = 'John'
        @age    = 32
        @gender = 'male'
    end
end

person = PersonFactory.new.createFactory('Taro');
person.appointment.each do |key,value| 
    puts "#{key} is #{value}"
end
