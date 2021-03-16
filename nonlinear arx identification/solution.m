load iddata-10.mat
global reg
uid=id.u;
yid=id.y;
uval=val.u;
yval=val.y;
%% Tuning the parameters

MSEpred_star=99999; % assign some large initial value
MSEsim_star=99999; % assign some large initial value
nk=1;
for m=1:5
    for na=1:3
        for nb=1:3
            for nk=1:3
                PHI=regressor(na,nb,nk,m,yid,uid);
                format long
                theta=PHI\yid;
                PHI=[];
                % prediction:
                
                phipred=regressor(na,nb,nk,m,yval,uval);
                ypred=phipred*theta;
                
                %MSE for prediction:
                offset=na+nb+nk; %the MSE should be computed from the offset to ignore the initial large errors
                MSEpred=sum((yval(offset:end)-ypred(offset:end)).^2)/(length(yval)-offset);
                if(MSEpred<MSEpred_star)
                    na_star_pred=na;
                    nb_star_pred=nb;
                    nk_star_pred=nk;
                    m_star_pred=m;
                    MSEpred_star=MSEpred;
                    ypredstar=ypred;
                end
                
                % simulation:
                
                compute_sim_MSE=true;
                ysim=zeros(length(uval),1);
                for i=nb+nk:length(uval)
                    for a=1:na
                        ind=i-a;
                        if ind>0
                            r_e(a)=-1*ysim(ind);
                        else
                            r_e(a)=0;
                        end
                    end     
                    for b=1:nb
                        ind=i-b-nk+1;
                        if ind>0
                            r_e(na+b)=uval(ind);
                        else
                            r_e(na+b)=0;
                        end
                    end
                    phisim=regressor_poly(r_e,na+nb,m);   
                    ysim(i)=phisim*theta;
                    phisim=[];
                    r_e=[];
                    if(isnan(ysim(i))) %if the simulation is unstable
                        compute_sim_MSE=false; %don't compute its MSE
                        disp('unstable')
                        break %stop the simulation for the given parameters
                    end
                end
                
                %MSE for simulation:
                offset=na+nb+nk;%the MSE should be computed from the offset to ignore the initial large errors
                if(compute_sim_MSE==true)
                    MSEsim=sum((yval(offset:end)-ysim(offset:end)).^2)/(length(yval)-offset);
                    if(MSEsim<MSEsim_star)
                        na_star_sim=na;
                        nb_star_sim=nb;
                        nk_star_sim=nk;
                        m_star_sim=m;
                        MSEsim_star=MSEsim;
                        ysimstar=ysim;
                    end
                end
            end
        end
    end
end
%% Plotting ypredstar and ysimstar

m_star_pred=3;
na_star_pred=3;
nb_star_pred=3;
MSEpred_star=1.593187291090241e-10;

m_star_sim=2;
na_star_sim=3;
nb_star_sim=3;
MSEsim_star=9.202397090799877e-07;

% prediction
na=na_star_pred;
nb=nb_star_pred;
nk=nk_star_pred;
m=m_star_pred;

PHI=regressor(na,nb,nk,m,yid,uid);
format long
theta=PHI\yid;

phipred=regressor(na,nb,nk,m,yval,uval);
ypred=phipred*theta;
plot(ypred(na+nb+nk:end));hold
plot(yval(na+nb+nk:end),'.')
grid
legend('ypred_s_t_a_r','yval')
title(['MSE=',num2str(MSEpred_star)])
shg
% simulation:

na=na_star_sim;
nb=nb_star_sim;
nk=nk_star_sim;
m=m_star_sim;

PHI=regressor(na,nb,nk,m,yid,uid);
format long
theta=PHI\yid;

ysim=zeros(length(uval),1);
for i=nb+nk-1:length(uval)
    r_e=[];
    for a=1:na
        ind=i-a;
        if ind>0
            r_e(a)=-1*ysim(ind);
        else
            r_e(a)=0;
        end
    end
    for b=1:nb
        ind=i-b-nk+1;
        if ind>0
            r_e(na+b)=uval(ind);
        else
            r_e(na+b)=0;
        end
    end
    phisim=[];
    phisim=regressor_poly(r_e,na+nb,m);
    ysim(i)=phisim*theta;
    if(isnan(ysim(i))) 
        break
    end
end
figure
plot(ysim(na+nb+nk:end));hold
plot(yval(na+nb+nk:end),'.')
grid
legend('ysim_s_t_a_r','yval')
title(['MSE=',num2str(MSEsim_star)])
shg
%% functions

function phi = regressor(na,nb,nk,m,y,u)
    r_e=regressor_elements(na,nb,nk,y,u);
    n=na+nb;
    for i=1:length(y)
        phi(i,:)=regressor_poly(r_e(i,:),n,m);
    end
end

function r_p = regressor_poly(x,n,m)
    % x - vector of previous inputs and outputs of the system
    % n - number of elements in x (na + nb)
    % m - polynomial order
    global reg
    reg(1)=1;
    for pair_terms=1:n
        if(pair_terms<=m) %a pair can be formed if it has LESS/= elements than the maximum degree
            recursive_pair(x,n,pair_terms,m,[],[],0)
        end
    end
    r_p=reg;
    reg=[];
end

function r_e = regressor_elements(na,nb,nk,y,u)
    for i=1:length(y)
        for a=1:na
            ind=i-a;
            if ind>0
                r_e(i,a)=-1*y(ind);
            else
                r_e(i,a)=0;
            end
        end
      
        for b=1:nb
            ind=i-nk-b+1;
            if ind>0
                r_e(i,na+b)=u(ind);
            else
                r_e(i,na+b)=0;
            end
        end 
    end
end

function recursive_pair(x,n,pair_terms,m,exponents,x_indices,prev_index)
    % x - vector of previous inputs and outputs of the system 
    % n - number of elements in x (na + nb)
    % pair_terms - number of terms for the pairs to be made 
    % m - polynomial order
    % exponents - vector with the exponents 'p' chosen for the current pair,
    %             initialized as an empty vector(needed for recursion)
    % x_indices - vector with the indices of the elements in x chosen for
    %             the current pair, initialized as empty (neeeded for recursion) 
    %--each value of 'exponents' corresponds to each value of 'x_indices'--
    % prev_index - the last index of an element from x introduced in the
    %              pair(could be substituted by x_indices(end) but that 
    %              wouldn't account for the very first function call)
    
    global reg %this is where the regressor polynomial terms will be saved
    for a=prev_index+1:n-(pair_terms-1) %cycle through the elements(start after the previous chosen one to avoid repeating a pair)
         x_indices(length(x_indices)+1)=a; %save current element
         for p=1:m %cycle through all possible exponents
            exponents(length(exponents)+1)=p; %save current exponent
            if (pair_terms~=1) %if the pair is not of length 'pair_terms'
                recursive_pair(x,n,pair_terms-1,m,exponents,x_indices,a)%introduce a new element/exponent in the pair
            else  %if the pair is of length 'pair_terms'
                if(sum(exponents)<=m) % introduce the new pair in the regressor polynomial
                    ind=length(reg)+1; 
                    aux=x(x_indices(1))^exponents(1);                  
                    for k=2:length(x_indices)
                        aux=aux*x(x_indices(k))^exponents(k); %multiply all chosen elements from x at their respective powers
                    end
                    reg(ind)=aux; %save the new pair in the regressor polynomial                   
                end
            end
            exponents=exponents(1:length(exponents)-1); %the last exponent is removed from the pair to allow for the next one
         end  
        x_indices=x_indices(1:length(x_indices)-1); %the last element is removed from the pair to allow for the next one
    end
end
