class YamadaAdaptee
    def initialize
        @name   = 'Yamada'
    end

    def getName
        return @name
    end
end

class TaroAtapter < YamadaAdaptee
    def initialize
        super()
    end

    def getName
        return @name + 'Taro'
    end
end

class TakashiAtapter < YamadaAdaptee
    def initialize
        super()
    end

    def getName
        return @name + 'Takashi'
    end
end

class YamadaTarget
    def initialize name 
        begin
            @obj = Object.const_get(name).new
        rescue
            return nil
        end
    end

    def getName
        @obj.getName
    end
end

client = YamadaTarget.new('TaroAtapter')
p client.getName
client = YamadaTarget.new('TakashiAtapter')
p client.getName
