game.GameTimerManager = Object.extend(  {
    init: function(x, y, settings){
        this.now = new Date().getTime();
        this.lastCreep = new Date().getTime();
        this.pause = false;
        this.alwaysUpdate = true;
    },
    
    update: function(){
        this.now = new Date().getTime();      
        this.goldTimerCheck();
        this.creepTimerCheck();
        
        return true;
    },
    
    goldTimerCheck: function(){
        if(Math.round(this.now/1000)%20 ===0 && (this.now - this.lastCreep >= 1000)){
             game.data.gold += game.data.exp1+1;
             console.log("Current gold: " + game.data.gold);
        } 
    },
    
    creepTimerCheck: function(){
        if(Math.round(this.now/1000)%10 ===0 && (this.now - this.lastCreep >= 1000)){
            this.lastCreep = this.now;
            var creepe = me.pool.pull("EnemyCreep", 2200, 420, {});
            me.game.world.addChild(creepe, 5);
        }  
    },
});



game.ExperienceManager = Object.extend({
   init: function(x, y, settings){
       this.alwaysUpdate = true;
       this.gameOver = false;
   },
   
   update: function(){
       if(game.data.win === true && !this.gameOver){
           this.gameOver(true);
       }else if(game.data.win === false && !this.gameOver){
           this.gameOver(false);
       }
       
       return true;
   },
   
   gameOver: function(win){
       if(win){
           game.data.exp += 10; 
       }else{
           game.data.exp += 1;
       }
       console.log(game.data.exp);
       this.gameOver = true;
       me.save.exp =  game.data.exp;    
   }
    
});

