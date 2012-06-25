module ParentImpl
    def initialize
        @name = 'taro'
    end
    def getName
    end
end

class ChildImpl
    include ParentImpl
    def getName
       return @name 
    end
end
