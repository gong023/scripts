class ParentFunc
    def initialize
        @gender = 'male'
        @age  = 21
    end

    def getGender
        return @gender
    end
end

class ChildFunc < ParentFunc 
    def getAge
        return @age
    end
end
