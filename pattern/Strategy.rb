class Battle
    def initialize(strategy)
        @strategy = strategy
    end

    def getResult
        @strategy.getNum()
    end
end

class StrongStrategy
    def initialize
        @num = 100
    end

    def getNum
        rand(@num)
    end
end

class WeekStrategy
    def initialize
        @num = 50
    end

    def getNum
        rand(@num)
    end
end

strong = Battle.new(StrongStrategy.new)
week   = Battle.new(WeekStrategy.new)
result = []
5.times {result << true if strong.getResult > week.getResult}
p "StrongStrategy won #{result.count} times."
