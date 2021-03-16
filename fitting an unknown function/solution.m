load proj_fit_22.mat %loading the given data sets
x1id=id.X{1};
x2id=id.X{2};
yid=id.Y;
surf(x1id,x2id,yid)
x1val=val.X{1};
x2val=val.X{2};
yval=val.Y;
%% the flattening:
ind=0;
for i=1:length(x1id)
    for j=1:length(x2id)
        ind=ind+1;
        xidflat(ind,1)=x1id(i);
        xidflat(ind,2)=x2id(j);
    end
end

ind=0;
for i=1:length(x1val)
    for j=1:length(x2val)
        ind=ind+1;
        xvalflat(ind,1)=x1val(i);
        xvalflat(ind,2)=x2val(j);
    end
end

sizeyid=size(yid);
ind=0;
for i=1:sizeyid(1)
    for j=1:sizeyid(2)
        ind=ind+1;
        yidflat(ind)=yid(i,j);
    end
end

sizeyval=size(yval);
ind=0;
for i=1:sizeyval(1)
    for j=1:sizeyval(2)
        ind=ind+1;
        yvalflat(ind)=yval(i,j);
    end
end
%% Validation
for m=1:50
    X=regressor(m,xidflat);
    theta = X\yidflat.';
    Xval=regressor(m,xvalflat);
    yhatflat = Xval*theta;
    MSE = 0;
    for i = 1:length(yvalflat)
        MSE = MSE + (yvalflat(i)-yhatflat(i))^2;
    end
    mse(m) = MSE/length(yvalflat);
end

best_m=1;
for i=1:length(mse)
    if mse(i)<mse(best_m)
        best_m=i;
    end
end
%% MSE plot
stem(mse(1:50))
grid
ylabel('MSE')
xlabel('m')
%% the deflattening of the best solution:
m=best_m;
X=regressor(m,xidflat);
theta = X\yidflat.';
Xval=regressor(m,xvalflat);
yhatflat = Xval*theta;
   
sizeyval=size(yval);
ind=0;
for i=1:sizeyval(1)
    for j=1:sizeyval(2)
        ind=ind+1;
        yhat(i,j)=yhatflat(ind);
    end
end

mesh(x1val,x2val,yval,'EdgeColor','blue'); hold on
mesh(x1val,x2val,yhat,'EdgeColor','red'); hold on
legend('Real output','Approximation')
xlabel('x1')
ylabel('x2')
zlabel('y')
%% m=40 overfit
m=40;
X=regressor(m,xidflat);
theta = X\yidflat.';
Xval=regressor(m,xvalflat);
yhatflat = Xval*theta;
    
sizeyval=size(yval);
ind=0;
for i=1:sizeyval(1)
    for j=1:sizeyval(2)
        ind=ind+1;
        yhat(i,j)=yhatflat(ind);
    end
end
subplot(121)
mesh(x1val,x2val,yval,'EdgeColor','blue'); hold on
mesh(x1val,x2val,yhat,'EdgeColor','red'); hold on
legend('Real output','Approximation')
xlabel('x1val')
ylabel('x2val')
zlabel('yval')
title('Approximation on validation data')
%
X=regressor(m,xidflat);
theta = X\yidflat.';
yflat=X*theta;
sizey=size(yid);
ind=0;
for i=1:sizey(1)
    for j=1:sizey(2)
        ind=ind+1;
        y(i,j)=yflat(ind);
    end
end

MSE = 0;
for i = 1:length(yid)
    MSE = MSE + (yid(i)-y(i))^2;
end
MSE=MSE/length(yid);
subplot(122)
mesh(x1id,x2id,yid,'EdgeColor','blue'); hold on
mesh(x1id,x2id,y,'EdgeColor','red'); hold on
legend('Real output','Approximation')
xlabel('x1id')
ylabel('x2id')
zlabel('yid')
title('Approximation on identification data')

%%
%function for building the regressor matrix:
function r = regressor(m,x)
    size_x=size(x);
    length_x=size_x(1);

    for i=1:length_x
        r(i,1)=1;
        for j=1:m
             r(i,2*j)=x(i,1)^j;
             r(i,2*j+1)=x(i,2)^j;
        end
        ind=2*m;
        for j=1:m-1
            for k=1:m-j
                ind=ind+1;
                r(i,ind)=(x(i,1)^j)*(x(i,2)^k);                 
            end
        end
     end
end
