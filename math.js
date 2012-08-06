/**
 * @author choi
 */
Matrix= function(){
    elements= new Float32Array(16);
}

Matrix.prototype.flattern= function(){
    return elements;
}

Matrix.prototype.toString= function(){
    return
        elements[0]+", "+elements[1]+", "+elements[2]+", "+elements[3]+"\n" +
        elements[4]+", "+elements[5]+", "+elements[6]+", "+elements[7]+"\n" +
        elements[8]+", "+elements[9]+", "+elements[10]+", "+elements[11]+"\n" +
        elements[12]+", "+elements[13]+", "+elements[14]+", "+elements[15];
}

Matrix.prototype.makeIdentity= function(){
    elements[1]= elements[2]= elements[3]= elements[4]= 
    elements[6]= elements[7]= elements[8]= elements[9]= 
    elements[11]= elements[12]= elements[13]= elements[14]= 0;
    elements[0]= elements[5]= elements[10]= elements[15]= 1; 
}

Matrix.prototype.translate= function(x, y, z){
    elements[1]= elements[2]= elements[3]= elements[4]= 
    elements[6]= elements[7]= elements[8]= elements[9]= elements[11]= 0;
    elements[0]= elements[5]= elements[10]= elements[15]= 1; 

    elements[12]=x;
    elements[13]=y;
    elements[14]=z;
}

Matrix.prototype.rotateX= function(angle){
    var c= Math.cos(angle);
    var s= Math.sin(angle);
    elements[0]=1;  elements[1]= 0; elements[2]=0;  elements[3]=0;
    elements[4]=0;  elements[5]= c; elements[6]=s;  elements[7]=0;
    elements[8]=0;  elements[9]=-s; elements[10]=c; elements[11]=0;
    elements[12]=0; elements[13]=0; elements[14]=0; elements[15]=1;
}

Matrix.prototype.rotateZ= function(angle){
    var c= Math.cos(angle);
    var s= Math.sin(angle);
    elements[0]= c;  elements[1]=s; elements[2]=0;  elements[3]=0;
    elements[4]=-s;  elements[5]=c; elements[6]=0;  elements[7]=0;
    elements[8]= 0;  elements[9]=0; elements[10]=0; elements[11]=0;
    elements[12]=0; elements[13]=0; elements[14]=0; elements[15]=1;
}