class Person 
    def appointment
        person = {
            'name'   => getName,
            'age'    => getAge,
            'gender' => getGender
        }
        return person
    end

    def getName
    end

    def getAge 
    end

    def getGender 
    end
end

class Taro < Person
    def getName
        return 'taro'
    end

    def getAge
        return 21 
    end

    def getGender
        return 'male'
    end
end

Taro.new.appointment.each do |key,value|
    puts "#{key} is #{value}"
end
